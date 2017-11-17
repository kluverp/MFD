<?php

namespace Mfd\Screens;


abstract class Screen 
{
    /**
     * Screen color
     */
    protected $color = 7;
    
    /**
     * ANSI screen colors
     */
    protected $colors = [
        'black'   => 0,
        'red'     => 1,
        'green'   => 2,
        'yellow'  => 3,
        'blue'    => 4,
        'magenta' => 5,
        'cyan'    => 6,
        'white'   => 7
    ];

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


}
