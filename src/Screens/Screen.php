<?php

namespace Mfd\Screens;

//use Mfd\Mfd as Mfd;
use Mfd\IO;


/*

+-------------------------------------------------------------------------------------------------+
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
|                                                                                                 |
+-------------------------------------------------------------------------------------------------+

*/

abstract class Screen 
{   
    /**
     * Screen identifying name
     */
    const NAME = '';
    
    /**
     * The MFD instance
     */
    protected $mfd = null;
    
    /**
     * The IO  instance
     */
    protected $io = null;
    
    /**
     * Console width
     */
    protected $cols = null;
    
    /**
     * Console height
     */
    protected $lines = null;
    
    /**
     * Flag indicating when re-draw is needed
     */
    protected $dirty = false;
    
    /**
     * ANSI screen colors
     */   
    protected $ansiColors = [
        "black"         => "30",
        "red"           => "31",
        "green"         => "32",
        "yellow"        => "33",
        "blue"          => "34",
        "magenta"       => "35",
        "cyan"          => "36",
        "light-gray"    => "37",
        "default"       => "39",
        "gray"          => "90",
        "light-red"     => "91",        
        "light-green"   => "92",        
        "light-yellow"  => "93",        
        "light-blue"    => "94",        
        "light-magenta" => "95",        
        "light-cyan"    => "96",                
        "white"         => "97",
    ];
    
    /**
     * Screen Constructor
     */
    public function __construct(IO $io)
    {
        // the io object
        $this->io = $io;
        
        // store console dimensions
        $this->cols  = system('tput cols');
        $this->lines = system('tput lines');
    }

    /**
     * Clear the screen
     */
    public function clear()
    {
        system('clear');
    }
    
    /**
     * Draw the screen
     */
    public function draw()
    {
        // reset the dirty flag
        $this->dirty = false;

        // move cursor to top, do not clear screen
        echo "\033[;H";

        // convert content array to full string
        $content = $this->contentToString();
        
        // draw to the console and pad to screen size
        echo $this->mb_str_pad($content, $this->cols * ($this->lines - 2)); // we cut two lines off: 1) the newline at first row and 2) the date below

        echo "\n" . '[' . date('H:i:s') . ']';
    
    }
    
    public function contentToString($color = 'green')
    {
        $str = '';
        foreach($this->getContent() as $row) {
            $str .= $this->row($row);
        }
        
        return $this->cstr($str, $color);
    }
    
    /**
     * Indicates when the screen is dirty, and must be re-drawn.
     */
    public function isDirty()
    {
        if($this->dirty) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Mark the screen as dirty, so redraw is needed.
     */
    public function dirty()
    {
        return $this->dirty = true;
    }
    
    /**
     * Set screen color
     */
    public function setColor($color)
    {
        if (isset($this->colors[$color])) {
            return $this->color = $this->colors[$color];
        }
        
        return false;
    }
    
    /**
     * Return a colored string
     */
    public function cstr($str, $fgColor = 'default', $bgColor = false)
    {
        // default color
        $colorCode = $this->ansiColors['default'];
        
        // if color is valid, set colorCode
        if(isset($this->ansiColors[$fgColor])) {
            $colorCode = $this->ansiColors[$fgColor];
        }
        
        // return colored string
        return sprintf("\e[%sm%s\e[0m", $colorCode, $str);
    }
    
    /**
     * Print a row to screen. Prepends a newline to each row, and pads the row with enough spaces 
     * on both sides to fill the entire screen. This way, the objects are always centered.
     *
     * @param string $str
     * @return string
     */
    protected function row($str = '')
    {              
        $str = $this->mb_str_pad($str, $this->cols -1, '#', STR_PAD_BOTH);
        
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
    protected function mb_str_pad( $input, $pad_length, $pad_string = ' ', $pad_type = STR_PAD_RIGHT)
    {
        $diff = strlen( $input ) - mb_strlen( preg_replace('/\\e\[\d{1,2}m/', '', $input));
        return str_pad( $input, $pad_length + $diff, $pad_string, $pad_type );
    }

    /**
     * When cast to string, return the screen name
     */
    public function __toString()
    {
        return self::NAME;
    }
}
