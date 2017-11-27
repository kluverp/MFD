<?php

namespace Mfd\Screens;

class LoudoutScr extends Screen
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
        $str = trim(
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
"        
);
    }    
}





