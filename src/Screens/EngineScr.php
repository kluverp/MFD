<?php

namespace Mfd\Screens;

class EngineScr extends Screen
{
    const NAME = 'engine';
        
        
    public function getContent()
    {                       
        $foo = [
            '+------------------------------------+',
            'TORQUE                       TGT  TGT',
            '┌─┐  ┌─┐                     ┌─┐  ┌─┐',
            '│ │  │ │                     │ │  │ │',
            '│ │  │ │                     │ │  │ │',
            '│ │  │ │                     │ │  │ │', 
            '│ │  │ │     Np   Nr   Np    │ │  │ │',
            '▐█▋  ▐█▋    ┌─┐  ┌─┐  ┌─┐    ▐█▋  ▐█▋',
            '▐█▋  ▐█▋    │ │  │ │  │ │    ▐█▋  ▐█▋',
            '▐█▋  ▐█▋    │ │  │ │  │ │    ▐█▋  ▐█▋',
            '▐█▋  ▐█▋    │ │  │ │  │ │    ▐█▋  ▐█▋',
            '▐█▋  ▐█▋    │ │  │ │  │ │    ▐█▋  ▐█▋',
            '082  082    ▐█▋  ▐█▋  ▐█▋    098  098',
            '            ▐█▋  ▐█▋  ▐█▋            ',
            '            ▐█▋  ▐█▋  ▐█▋            ',
            '            ▐█▋  ▐█▋  ▐█▋            ',
            '            093  100  097            ',
            '                                     ',
            '            FUEL:  '. $this->io->get('fuel') .' LBS          ',
        ];
        
        $str = '';
        foreach($foo as $row) {
            $str .= $this->row($row);
        }
        
        return $this->cstr($str, 'green');
    }
    
    /**
     *
     */
    protected function row($str = '')
    {              
        $str = $this->mb_str_pad($str, $this->cols -1, ' ', STR_PAD_BOTH);
        
        return "\n" . $str;
    }
    
    /**
     * mb_str_pad
     *
     * @param string $input
     * @param int $pad_length
     * @param string $pad_string
     * @param int $pad_type
     * @return string
     */
    public function mb_str_pad( $input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
    {
        $diff = strlen( $input ) - mb_strlen( $input );
        return str_pad( $input, $pad_length + $diff, $pad_string, $pad_type );
    }
}

