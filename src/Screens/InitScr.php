<?php

namespace Mfd\Screens;

class InitScr extends Screen 
{
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
