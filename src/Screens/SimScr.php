<?php

namespace Mfd\Screens;

class SimScr extends Screen 
{
    public function render()
    {            
        $panel = sprintf('|  %s  |  %s %s %s %s %s %s %s   |',
            $this->annunciator(0, 'light-yellow'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(!$this->mfd->getAttr('rounds'), 'red')
        );
               
        echo trim('
+--------------------------------+
'. $panel .'
+--------------------------------+
| Screen: '. str_pad($this->mfd->getScreen(), 23) .'|
+--------------------------------+
| Rounds: '. str_pad($this->mfd->getAttr('rounds'), 23) .'|
+--------------------------------+ 
');
    }
    
    /**
     * Print an annunciator on screen. 
     * 
     * @return string
     */
    private function annunciator($state = false, $color = 'white')
    {        
        if($state) {        
            return $this->color('██', $color);
        }
        
        return $this->color('▒▒', $color);
    }
    
    /**
     * 
     */
    private function color($str, $fgColor = 'default', $bgColor = false) {
    
        // default color
        $colorCode = $this->ansiColors['default'];
        
        // if color is valid, set colorCode
        if(isset($this->ansiColors[$fgColor])) {
            $colorCode = $this->ansiColors[$fgColor];
        }
        
        // return colored string
        return "\e[{$colorCode}m". $str . "\e[0m";
    }
}




