<?php

namespace Mfd\Screens;

//use Mfd\Mfd as Mfd;
use Mfd\IO;


/*

+-------------------------------------------------------------------------------------------------+
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
+-------------------------------------------------------------------------------------------------+

*/

abstract class Screen 
{   
    /**
     * Screen identifying name
     */
    const NAME = '';
    
    /**
     * The MFD instance
     */
    protected $mfd = null;
    
    /**
     * The IO  instance
     */
    protected $io = null;
    
    /**
     * Console width
     */
    protected $cols = null;
    
    /**
     * Console height
     */
    protected $lines = null;
    
    /**
     * Flag indicating when re-draw is needed
     */
    protected $dirty = false;
    
    /**
     * ANSI screen colors
     */   
    protected $ansiColors = [
        "black"         => "30",
        "red"           => "31",
        "green"         => "32",
        "yellow"        => "33",
        "blue"          => "34",
        "magenta"       => "35",
        "cyan"          => "36",
        "light-gray"    => "37",
        "default"       => "39",
        "gray"          => "90",
        "light-red"     => "91",        
        "light-green"   => "92",        
        "light-yellow"  => "93",        
        "light-blue"    => "94",        
        "light-magenta" => "95",        
        "light-cyan"    => "96",                
        "white"         => "97",
    ];
    
    /**
     * Screen Constructor
     */
    public function __construct(IO $io)
    {
        // the io object
        $this->io = $io;
        
        // store console dimensions
        $this->cols  = system('tput cols');
        $this->lines = system('tput lines');
    }

    /**
     * Clear the screen
     */
    public function clear()
    {
        system('clear');
    }
    
    /**
     * Draw the screen
     */
    public function draw()
    {
        // reset the dirty flag
        $this->dirty = false;

        // move cursor to top, do not clear screen
        echo "\033[;H";

        $content = $this->getContent();
        echo str_pad($content, ($this->cols * $this->lines));

        echo '[' . date('H:i:s') . ']';
    
    }
    
    /**
     * Indicates when the screen is dirty, and must be re-drawn.
     */
    public function isDirty()
    {
        if($this->dirty) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Mark the screen as dirty, so redraw is needed.
     */
    public function dirty()
    {
        return $this->dirty = true;
    }
    
    /**
     * Set screen color
     */
    public function setColor($color)
    {
        if (isset($this->colors[$color])) {
            return $this->color = $this->colors[$color];
        }
        
        return false;
    }
    
    /**
     * Return a colored string
     */
    public function cstr($str, $fgColor = 'default', $bgColor = false)
    {
        // default color
        $colorCode = $this->ansiColors['default'];
        
        // if color is valid, set colorCode
        if(isset($this->ansiColors[$fgColor])) {
            $colorCode = $this->ansiColors[$fgColor];
        }
        
        // return colored string
        return sprintf("\e[%sm%s\e[0m", $colorCode, $str);
    }

    /**
     * When cast to string, return the screen name
     */
    public function __toString()
    {
        return self::NAME;
    }
}
