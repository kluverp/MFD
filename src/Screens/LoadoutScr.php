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
    public function render()
    {        
        echo
"
                ╭───╓╖───╮
                │   ║║   │
                │┌──╨╨──┐│
                ││ 1200 ││
                │└──────┘│
  ╭╮  ╭────╮ ╭╮ │        │ ╭╮ ╭────╮  ╭╮
  ▐▌╭─│    │─▐▌─╯  CHAFF ╰─▐▌─│    │─╮▐▌
  ▐▌│ │    │ ▐▌     30     ▐▌ │    │ │▐▌
 ╱  ╲ │    │ ▐▌            ▐▌ │    │ ╱  ╲
    │ │ 50 │╱  ╲   FLARE  ╱  ╲│ 50 │ │
  ╭╮│ │    │        30        │    │ │╭╮
  ▐▌│ │    │       AUTO       │    │ │▐▌
  ▐▌╰─│    │──────────────────│    │─╯▐▌
 ╱  ╲ ╰────╯                  ╰────╯ ╱  ╲ 
";
    }
    
    /**
     * Returns the number of rounds. 
     */
    private function getRounds()
    {
        $rounds = $this->io->getRounds();
        
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
        
        return str_pad($rounds, 4);
    }
}





