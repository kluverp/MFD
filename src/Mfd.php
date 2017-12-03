<?php

namespace Mfd;

use React\EventLoop\Factory;
use Mfd\Screens\EngineScr;
use Mfd\Screens\HorizonScr;
use Mfd\Screens\InitScr;
use Mfd\Screens\LoadoutScr;
use Mfd\Screens\SimScr;
use Mfd\Screens\TcasScr;


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

    /**
     * The IO object
     *
     * @var null
     */
    private $io = null;

    private $stdin = null;

    private $i = 0;
    

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

    /**
     * Initialze the MFD
     */
    private function init()
    {
        // init IO object
        $this->io = new IO($this->stdin);
        
        // init all screens
        $this->screens[EngineScr::NAME]  = new EngineScr($this->io);
        $this->screens[HorizonScr::NAME] = new HorizonScr($this->io);
        $this->screens[InitScr::NAME]    = new InitScr($this->io);
        $this->screens[LoadoutScr::NAME] = new LoadoutScr($this->io);        
        $this->screens[SimScr::NAME]     = new SimScr($this->io);
        $this->screens[TcasScr::NAME]    = new TcasScr($this->io);
        
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
        $this->i = 0;

        // clear the screen
        system('clear');

        // handle event loop
        $loop->addPeriodicTimer(0.05, function () {

            // move cursor to top, do not clear screen
            echo "\033[;H";

            // render current screen
            ($this->screens[$this->screen])->render();

            // debug
            echo "\n[" . $this->chars[$this->i] . "]";
            
            // process user input
            if($screen = $this->io->processInput()) {
                $this->setScreen($screen);
            }

            $this->i++;
            if($this->i == count($this->chars)) {
                $this->i = 0;
            }
        });
                            
        // next loop
        $loop->run();            
        
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