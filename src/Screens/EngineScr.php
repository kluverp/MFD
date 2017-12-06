<?php

namespace Mfd\Screens;

class EngineScr extends Screen
{
    /**
     * Screen identifyer
     */
    const NAME = 'engine';
        
        
    /**
     * Returns the screen contents
     */
    public function getContent()
    {                       
        return [
            '+------------------------------------+',
            ' TORQUE                      TGT  TGT',
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
    }
}

