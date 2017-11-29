<?php

namespace Mfd\Screens;

class HorizonScr extends Screen
{
    const NAME = 'horizon';
        
    public function render()
    {                
        echo trim("Horizon screen");
    }
}
/*



               219
 83%   15 ╷ ╷ S ╷ ╷ 21 ╷ ╷ W     1160
         ^
     
  
       30 ┌───     ───┐ 30
                -
       20 ┌───     ───┐ 20          ─
                -                   ╶
       10 ┌───     ───┐ 10          ╶
                -                  ▶╶
 12   ───────── W ──────────   450  ━ 
                -                   ╶
       10 └╶╶╶     ╴╴╴┘ 10          ╶ 
                -                   ╶ 
       20 └╶╶╶     ╴╴╴┘ 20          ─
                -
       30 └╶╶╶     ╴╴╴┘ 30 
*/