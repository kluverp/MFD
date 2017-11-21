<?php

namespace Mfd;

use React\EventLoop\Factory;
use Mfd\Screens\InitScr;
use Mfd\Screens\SimScr;


class Mfd
{
    /**
     * All Screens
     */
    private $screens = [];
    
    /**
     * Current screen on display
     */
    private $screen = null;

    private $chars = ['|', '/', '-', '\\', '|'];
    
    private $io = null;
    

    /**
     * MFD constructor.
     */
    public function __construct()
    {
        // set stream as non-blocking
        if (stream_set_blocking(STDIN, false) !== true) {
            fwrite(STDERR, 'ERROR: Unable to set STDIN non-blocking' . PHP_EOL);
            exit(1);
        }

        // make the terminal return each key pressed and do not echo to screen
        //system('stty cbreak -echo');
        system('stty -icanon -echo');
        $this->stdin = fopen('php://stdin', 'r');
        
        // init 
        $this->init();
    }
        
    private function init()
    {
        // init IO
        $this->io = new IO();
        
        // init all screens
        $this->screens[InitScr::NAME] = new InitScr($this, $this->io);
        $this->screens[SimScr::NAME]  = new SimScr($this, $this->io);
        
        // set default screen
        $this->setScreen(SimScr::NAME);    
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
                //echo $this->screen;
                //echo $this->rounds;
                
                ($this->screens[$this->screen])->render();
            });

            // process user input
            $this->processInput();

            $i++;
            if($i == count($this->chars)) {
                $i = 0;
            }
                                

            $loop->run();            
        }
    }

    /**
     * Process user input, or GPIO signals
     */
    public function processInput()
    {
        // get ASCII char code
        $c = ord(fgetc($this->stdin));

        // and process it
        switch($c) {
            case 27: // escape
                // make the terminal behave normally again
                system('stty sane');
                exit("\nQuit.\n");
                break;
            case 49: // 1
                $this->screen = InitScr::NAME;
                break;
            case 50: // 2
                $this->screen = SimScr::NAME;
                break;
            case 32: // space bar
                if($this->io->get('ROUNDS') > 0) {
                    $this->io->set('ROUNDS', $this->io->get('ROUNDS') - 1);
                } else {
                    $this->io->raise('WRN_LIGHT_6');
                }
                break;
            case 109:
                    $this->io->toggle('MASTER_CAUTION');
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

        return $this->screen = $screen;
    }
    
    public function getScreen()
    {
        return $this->screen;
    }
    
    public function getAttr($attr)
    {
        if(isset($this->attributes[$attr])) {
            return $this->attributes[$attr];
        }
        
        return false;
        
    }
    
    public function setAttr($attr, $value) {
        return $this->attributes[$attr] = $value;
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