<?php

namespace Mfd\Screens;

class InitScr extends Screen
{
    const NAME = 'init';
    
    public function render()
    {
        echo `tput setaf $this->color`;
        echo trim('
+---------------------------------------------------------+
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
|                                                         |
+---------------------------------------------------------+       
');
    }
}
