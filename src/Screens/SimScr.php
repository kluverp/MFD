<?php

namespace Mfd\Screens;

class SimScr extends Screen 
{
    const NAME = 'sim';
    
    public function render()
    {            
        $panel = sprintf('|  %s  |  %s %s %s %s %s %s %s   |',
            $this->annunciator($this->io->get('MASTER_CAUTION'), 'light-yellow'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(0, 'red'),
            $this->annunciator(!$this->io->get('rounds'), 'red')
        );
               
        echo trim('
+---------------------------------        
| Light             | Item            | Key |        
+---------------------------------
| '. $this->annunciator($this->io->get('MASTER_CAUTION'), 'light-yellow') . ' | MASTER_CAUTION | M
+--------------------------------+
| '. $this->annunciator($this->io->get('ENG_FIRE_1'), 'red') . ' | ENG_FIRE_1 | E
+--------------------------------+
| '. $this->annunciator($this->io->get('ENG_FIRE_2'), 'red') . ' | ENG_FIRE_2 | R
+--------------------------------+
| '. $this->annunciator($this->io->get('HYD_OIL_PRESS'), 'red') . ' | HYD_OIL_PRESS | H
+--------------------------------+
| '. $this->annunciator($this->io->get('CANOPY'), 'red') . ' | CANOPY | C
+--------------------------------+
| '. $this->annunciator($this->io->get('FUEL LOW'), 'red') . ' | FUEL LOW | F
+--------------------------------+
'. $panel .'
+--------------------------------+
| Screen: '. str_pad($this->mfd->getScreen(), 23) .'|
+--------------------------------+
| Rounds: '. str_pad($this->io->get('rounds'), 23) .'|
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
            return $this->cstr('██', $color);
        }
        
        return $this->cstr('▒▒', $color);
    }
    
    /**
     * 
     */
    private function table($headers = [], $rows = [])
    {
        
    }
}




