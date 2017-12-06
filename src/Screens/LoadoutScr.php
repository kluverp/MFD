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
        // get rounds
        $rounds = $this->io->get('rounds');

        // pad it with leading zeros
        $rounds = str_pad($rounds, 4, '0', STR_PAD_LEFT);

        // add colors
        switch($rounds) {
            case $rounds == 0:
                $str = $this->cstr($rounds, 'white', 'green', 41);
                break;
            case $rounds < 100:
                $str = $this->cstr($rounds, 'red', 'green');
            break;
            case $rounds < 500:
                $str = $this->cstr($rounds, 'yellow', 'green');
            break;
            default:
                $str = $rounds;            
        }
        
        return $str;
    }
}





