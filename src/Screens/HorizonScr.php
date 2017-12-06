<?php

namespace Mfd\Screens;

class HorizonScr extends Screen
{
    /**
     * Screen identifier
     */
    const NAME = 'horizon';
        
    /**
     * Returns the screen content
     */
    public function getContent()
    {                
        return [
            '                     219                   ',
            '      83%   15 ╷ ╷ S ╷ ╷ 21 ╷ ╷ W     1160 ',
            '              ^                            ',
            '                                           ',
            '                                           ',  
            '            30 ┌───     ───┐ 30            ',
            '                     -                     ',
            '            20 ┌───     ───┐ 20          ─ ',
            '                     -                   ╶ ',
            '            10 ┌───     ───┐ 10          ╶ ',
            '                     -                  ▶╶ ',
            '      12   ───────── W ──────────   450  ━ ',
            '                     -                   ╶ ',
            '            10 └╶╶╶     ╴╴╴┘ 10          ╶ ',
            '                     -                   ╶ ',
            '            20 └╶╶╶     ╴╴╴┘ 20          ─ ',
            '                     -                     ',
            '            30 └╶╶╶     ╴╴╴┘ 30            ',
        ];
    }
}
