<?php

namespace Mfd;

use Mfd\Screens\InitScr;
use Mfd\Screens\SimScr;

class IO {

    /**
     * Init 
     */
    private $MASTER_CAUTION = 0;
    private $ENG_FIRE_1     = 0; // ENG_FIRE 1
    private $ENG_FIRE_2     = 0; // ENG_FIRE 2
    private $HYD_OIL_PRESS  = 0; // HYD/OIL PRESS.
    private $CANOPY         = 0; // CANOPY
    private $FUEL_LOW       = 0; // FUEL LOW
    private $BINGO_ROUNDS   = 0; // FIRE_BTN
    private $ROUNDS         = 12;
    private $MISSILES       = 4;
    
    // MASTER_ARM (Switch RED)
    // JETTISON ALL (Switch ORANGE)
    // SYSTEMS_ON (Switch BLUE)
    // LIGHTS_ON (Switch WHITE)
    // COCKPIT-LIGHT / NAV-LIGHT

    private $stdin = null;

    public function __construct($stdin)
    {
        $this->stdin = $stdin;
    }


    public function lower($name)
    {
        $this->{strtoupper($name)} = 0;
        //system('';)
    }
    
    public function raise($name)
    {
        $this->{strtoupper($name)} = 1;
    }
    
    public function get($name)
    {
        $name = strtoupper($name);
        if(property_exists($this, $name)) {
            return $this->{$name};
        }
        return false;
    }
    
    public function set($name, $value) {
        return $this->{$name} = $value;
    }
    
    public function toggle($name) {
        return $this->{$name} = !$this->{$name};
    }

    /**
     * Process user input, or GPIO signals
     */
    public function processInput()
    {
        // get ASCII char code
        $c = ord(fgetc($this->stdin));

        // and process it
        switch($c) {
            case 27: // escape
                // make the terminal behave normally again
                system('stty sane');
                exit("\nQuit.\n");
                break;
            case 49: // 1
                return InitScr::NAME;
                break;
            case 50: // 2
                return SimScr::NAME;
                break;
            case 32: // space bar
                if($this->get('ROUNDS') > 0) {
                    $this->set('ROUNDS', $this->get('ROUNDS') - 1);
                } else {
                    $this->raise('BINGO_ROUNDS');
                }
                break;
            case 99: // c
                $this->toggle('CANOPY');
                break;
            case 101:
                $this->toggle('ENG_FIRE_1');
                break;
            case 102:
                $this->toggle('FUEL_LOW');
                break;
            case 104:
                $this->toggle('HYD_OIL_PRESS');
                break;
            case 109:
                $this->toggle('MASTER_CAUTION');
                break;
            case 114:
                $this->toggle('ENG_FIRE_2');
                break;
        }
    }

}