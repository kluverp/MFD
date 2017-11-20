<?php

namespace Mfd;

use Mfd\Screens\InitScr;

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
    
    
    const SCR_INIT = 'init';
    
    
    public function __construct()
    {
        // init all screens
        $this->screens[self::SCR_INIT] = new InitScr();
    }
    
    /**
     * Read user input
     */
    public function readChar($prompt)
    {
        readline_callback_handler_install($prompt, function() {});
        $char = stream_get_contents(STDIN, 1);
        readline_callback_handler_remove();
        return $char;
    }

    public function readGPIO()
    {

    }
    
    public function run()
    {
        while(1)
        {
            // process user input
            $this->processInput($this->readChar(''));
                                
            
            // process input            
            $screen = $this->screens['init'];
            $screen->setColor('green');
            //$screen->clear();
            //$screen->render();
            //sleep(1);       
            
        }
    }
    
    public function processInput($input)
    {
        switch($input) {
            case 1:
                echo '1';
            break;
            case 2:
                echo '2';
            break;
            default:
            $this->setScreen = self::SCR_INIT;
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