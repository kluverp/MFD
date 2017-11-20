<?php

namespace Mfd;

use Mfd\Screens\InitScr;
use React\EventLoop\Factory;

class MFD
{
    /**
     * All Screens
     */
    private $screens = [];
    
    /**
     * Current screen on display
     */
    private $screen = null;
    private $rounds = 1200;
    private $chars = ['|', '/', '-', '\\', '|'];
    
    
    const SCR_INIT = 'init';

    /**
     * MFD constructor.
     */
    public function __construct()
    {
        // init all screens
        $this->screens[self::SCR_INIT] = new InitScr();

        // set stream as non-blocking
        if (stream_set_blocking(STDIN, false) !== true) {
            fwrite(STDERR, 'ERROR: Unable to set STDIN non-blocking' . PHP_EOL);
            exit(1);
        }

        // make the terminal return each key pressed and do not echo to screen
        //system('stty cbreak -echo');
        system('stty -icanon -echo');
        $this->stdin = fopen('php://stdin', 'r');
    }

    /**
     * Run the Application
     */
    public function run()
    {
        // create new event loop
        $loop = Factory::create();
        $i = 0;

        while(1)
        {
            // handle event loop
            $loop->addTimer(0.01, function () use ($i) {

                system('clear');

                echo '[' . $this->chars[$i] . ']';
                echo $this->screen;
                echo $this->rounds;
            });

            // process user input
            $this->processInput();

            $i++;
            if($i == count($this->chars)) {
                $i = 0;
            }
                                
            
            // process input            
           // $screen = $this->screens['init'];
           // $screen->setColor('green');
            //$screen->clear();
            //$screen->render();
            //sleep(1);


            $loop->run();
        }
    }

    /**
     * Process user input, or GPIO signals
     */
    public function processInput()
    {
        $c = ord(fgetc($this->stdin));

        switch($c) {
            case 27:
                $this->screen = 'ESC';
                exit("\nQuit.\n");
                break;
            case 49:
                $this->screen = 'one';
                break;
            case 50:
                $this->screen = 'two';
                break;
            case 32:
                $this->rounds -= 1;
                break;
        }
    }

    /**
     * Set the current screen by name.
     *
     * @param $screen
     * @return string
     */
    public function setScreen($screen)
    {
        // if given screen is valid, set it as current
        if(in_array($screen, $this->screens)) {
            return $this->screen = $screen;
        }

        return $this->screen = 'init';
    }
}

/**


Capname	Description
bold	Start bold text
smul	Start underlined text
rmul	End underlined text
rev	Start reverse video
blink	Start blinking text
invis	Start invisible text
smso	Start "standout" mode
rmso	End "standout" mode
sgr0	Turn off all attributes
setaf <value>	Set foreground color
setab <value>	Set background color

*/