<?php

namespace Mfd\Screens;

class InitScr extends Screen
{
    const NAME = 'init';            
    
    public function __construct($io)
    {
        parent::__construct($io);
        
        $this->time = time();
    }
        
    public function getContent()
    {        
        return [
            'RADAR                      OK',
            'FLIR                       OK',
            'DTV                        OK',
            'DVO                        OK',                 
            'LASER DESIGNATOR           OK',    
            'RADAR JAMMER               OK',        
            'IR JAMMER                  OK',           
            'NAVIGATION COMPUTER        OK', 
            'COMMUNICATIONS             OK',      
            'RADAR WARNING SYSTEM       OK',
            'IHADSS                     OK',              
            'PNVS                       OK',                
            'STABILISER                 OK',          
            'MAIN ROTOR                 OK',          
            'TAIL ROTOR                 OK',          
            'ENGINE 1                   OK',            
            'ENGINE 2                   OK',            
            'HYDRAULICS                 OK',          
            'OIL PRESSURE               OK'
        ];
    }
    
    public function getValue($key)
    {
        return $this->items[$key];
    }
    
    public function setValue($status) 
    {            
        switch(strtoupper($status))
        {
            case 'OK':
                $value = $this->cstr('OK', 'green');
            break;
            case 'WARNING':
                $value = $this->cstr('WARNING', 'yellow');
            break;
            case 'FAILURE':
                $value = $this->cstr('FAILURE', 'red');
            break;
            default:        
                $value = "--";
        }
        
        return $value;
    }
}

