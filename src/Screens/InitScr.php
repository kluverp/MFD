<?php

namespace Mfd\Screens;

class InitScr extends Screen
{
    const NAME = 'init';
    
    private $items = [
        'RADAR' => 'OK',
        'FLIR' => 'OK',
        'DTV' => 'OK',
        'DVO' => 'OK',                 
        'LASER DESIGNATOR' => 'OK',    
        'RADAR JAMMER' => 'OK',        
        'IR JAMMER' => 'OK',           
        'NAVIGATION COMPUTER' => 'OK', 
        'COMMUNICATIONS' => 'OK',      
        'RADAR WARNING SYSTEM' => 'OK',
        'IHADSS' => 'OK',              
        'PNVS' => '--',                
        'STABILISER' => '--',          
        'MAIN ROTOR' => '--',          
        'TAIL ROTOR' => '--',          
        'ENGINE 1' => '--',            
        'ENGINE 2' => '--',            
        'HYDRAULICS' => '--',          
        'OIL PRESSURE' => '--',        
    ];
    
    public function __construct($mdf, $io)
    {
        parent::__construct($mdf, $io);
        
        // init
        foreach($this->items as $key => $value) {
            $this->items[$key] = $this->setValue('failure');
        }
    }
        
    public function render()
    {        
        $str = "\e[32m";
        foreach($this->items as $name => $value) {
            $name = '  ' . $this->cstr($name, 'green');
            $value = $value . '  ';
            $pad = $this->cols - strlen($value);
            $str .= str_pad($name, $pad) . $value . "\n";
        }
        
        echo trim($str) . "\e[0m]";
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
