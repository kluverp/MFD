<?php

namespace Mfd\Screens;

use Mfd\Mfd as Mfd;
use Mfd\IO;

abstract class Screen 
{   
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
    
    public function __construct(Mfd $mfd, IO $io)
    {
        $this->mfd = $mfd;
        $this->io = $io;
    }

    /**
     * Clear the screen
     */
    public function clear()
    {
        echo `clear`;
    }
    
    /**
     * Render the screen
     */
    public function render()
    {
    
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

    
    public function __toString()
    {
        return self::NAME;
    }
}
