<?php

namespace Mfd\Screens;

class DamageScr extends Screen
{
    /**
     * Screen identifyer
     */
    const NAME = 'damage';

    /**
     * Returns the screen contents
     */
    public function getContent()
    {
        return [
            "  ▀▀▀▀▀▀▀▀▀▀▀▄▄▀▀▀▀▀▀▀▀▀▀▀  ",
            "            █▀▀█            ",
            "           █▓▓▓▓█           ",
            "       ══▄▀█▓▓▓▓█▀▄══       ",
            "  ▄▄▄▄▄▄▄█▒█▓▓▓▓█▒█▄▄▄▄▄▄▄  ",
            "  █▀▀▀▀█▀███▄▓▓▄███▀█▀▀▀▀█  ",
            " ▄█▄  ▄█▄   ▀██▀   ▄█▄  ▄█▄ ",
            " █▒█  █▒█          █▒█  █▒█ ",
            " ▀▀▀  ▀▀▀          ▀▀▀  ▀▀▀ ",
        ];
    }
}


