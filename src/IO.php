<?php

namespace Mfd;

class IO {

    /**
     * Init 
     */
    private $MASTER_CAUTION = 0;
    private $WRN_LIGHT_0    = 0; // ENG_FIRE 1
    private $WRN_LIGHT_1    = 0; // ENG_FIRE 2
    private $WRN_LIGHT_2    = 0; // HYD/OIL PRESS.
    private $WRN_LIGHT_3    = 0; // CANOPY
    private $WRN_LIGHT_4    = 0; // FUEL LOW
    private $WRN_LIGHT_5    = 0; // 
    private $WRN_LIGHT_6    = 0; 
    private $ROUNDS         = 12;
    private $MISSILES       = 4;
    
    // MASTER_ARM (Switch RED)
    // JETTISON ALL (Switch ORANGE)
    // SYSTEMS_ON (Switch BLUE)
    // LIGHTS_ON (Switch WHITE)
    // 
    
    
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
        if(property_exists($this, $name)) {
            return $this->{strtoupper($name)};
        }
        return false;
    }
    
    public function set($name, $value) {
        return $this->{$name} = $value;
    }
    
    public function toggle($name) {
        return $this->{$name} = !$this->{$name};
    }

}
