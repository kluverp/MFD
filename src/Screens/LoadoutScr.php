<?php

namespace Mfd\Screens;

class LoadoutScr extends Screen
{
    /**
     * Screen identifier
     */
    const NAME = 'loadout';
   
        
    /**
     * Render the screen
     */
    public function getContent()
    {        
        return [
            '                ╭───╓╖───╮                ',
            '                │   ║║   │                ',
            '                │┌──╨╨──┐│                ',
            sprintf('                ││ %s ││                ', $this->getRounds()),
            '                │└──────┘│                ',
            '  ╭╮  ╭────╮ ╭╮ │        │ ╭╮ ╭────╮  ╭╮  ',
            '  ▐▌╭─│    │─▐▌─╯  CHAFF ╰─▐▌─│    │─╮▐▌  ',
            '  ▐▌│ │    │ ▐▌     30     ▐▌ │    │ │▐▌  ',
            ' ╱  ╲ │    │ ▐▌            ▐▌ │    │ ╱  ╲ ',
            '    │ │ 50 │╱  ╲   FLARE  ╱  ╲│ 50 │ │    ',
            '  ╭╮│ │    │        30        │    │ │╭╮  ',
            '  ▐▌│ │    │       AUTO       │    │ │▐▌  ',
            '  ▐▌╰─│    │──────────────────│    │─╯▐▌  ',
            ' ╱  ╲ ╰────╯                  ╰────╯ ╱  ╲ ',
        ];
    }
    
    /**
     * Returns the number of rounds. 
     */
    private function getRounds()
    {
        $rounds = $this->io->get('rounds');
        
        switch($rounds) {
            case $rounds < 500:
                $str = $this->cstr($rounds, 'yellow');
            break;
            case $rounds < 100:
                $str = $this->cstr($rounds, 'red');
            break;
            default:
                $str = $rounds;            
        }
        
        return $this->mb_str_pad($str, 4, 0, STR_PAD_LEFT);
    }
}





