<?php

namespace Mfd\Screens;

class TcasScr extends Screen
{
    const NAME = 'tcas';
        
    public function render()
    {                
        echo trim("TCAS screen");
    }
}



/*
◇ Non-Threat Traffic (blue)
◆ Proximity Intruder Traffic  (blue)
● Traffic Advisory "Traffic! Traffic!" (amber)

+03 
 ■ ↑↓  Resolution Advisory "Climb! Climb!" (red)
 
 */
 
 