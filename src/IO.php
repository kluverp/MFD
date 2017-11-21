<?php

namespace Mfd;

class IO {

    /**
     * Init 
     */
    private $MASTER_CAUTION = 0;
    private $WRN_LIGHT_0    = 0;
    private $WRN_LIGHT_1    = 0;
    private $WRN_LIGHT_2    = 0;
    private $WRN_LIGHT_3    = 0;
    private $WRN_LIGHT_4    = 0;
    private $WRN_LIGHT_5    = 0;
    private $WRN_LIGHT_6    = 0;
    private $ROUNDS         = 12;
    private $MISSILES       = 4;
    
    public function lower($name)
    {
        $this->{$name} = 0;
        //system('';)
    }
    
    public function raise($name)
    {
        $this->{$name} = 1;
    }
    
    public function get($name)
    {
        return $this->{strtoupper($name)};
    }
    
    public function set($name, $value) {
        return $this->{$name} = $value;
    }
    
    public function toggle($name) {
        return $this->{$name} = !$this->{$name};
    }

}
