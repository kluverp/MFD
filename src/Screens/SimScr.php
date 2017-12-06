<?php

namespace Mfd\Screens;

class SimScr extends Screen 
{
    /**
     * Screen identifier
     */
    const NAME = 'sim';
    
    /**
     * Returns array with rows
     */
    public function getContent()
    {
        return [
            '+------------------------------------------+',
            '| '. $this->cstr('Light', 'green') .' | '. $this->cstr(str_pad('Item', 15), 'green') .' | '. $this->cstr(str_pad('Key', 15), 'green') . ' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('MASTER_CAUTION'), 'light-yellow') . '    | MASTER_CAUTION | '. str_pad('M', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('ENG_FIRE_1'), 'red') . '    | ENG_FIRE_1     | '. str_pad('E', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('ENG_FIRE_2'), 'red') . '    | ENG_FIRE_2     | '. str_pad('R', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('HYD_OIL_PRESS'), 'red') . '    | HYD_OIL_PRESS  | '. str_pad('H', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('CANOPY'), 'red') . '    | CANOPY         | '. str_pad('C', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('FUEL_LOW'), 'red') . '    | FUEL_LOW       | '. str_pad('F', 15) .' |',
            '+------------------------------------------+',
            '| '. $this->annunciator($this->io->get('BINGO_ROUNDS'), 'red') . '    | BINGO_ROUNDS   | '. str_pad('B', 15) .' |',
            '+------------------------------------------+',
            '| Rounds: '. str_pad($this->io->get('rounds'), 33) .'|',
            '+------------------------------------------+', 
            '| Missiles: '. str_pad($this->io->get('missiles'), 31) .'|',
            '+------------------------------------------+',
        ];
    }
    
    /**
     * Print an annunciator on screen. 
     * 
     * @return string
     */
    private function annunciator($state = false, $color = 'white', $pad = false, $pad_type = false)
    {        
        if($state) {        
            return $this->cstr('██', $color);
            //return '@@';
        }
        //return 'OO';
        return $this->cstr('▒▒', $color);
    }
}




