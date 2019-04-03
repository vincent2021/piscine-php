<?php

class Color {

    public static $verbose = False;
    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public function __construct(array $kwargs) {
        if (array_key_exists('rgb', $kwargs)) {
            $this->blue = $kwargs['rgb'] & 255;
            $this->green = ($kwargs['rgb'] >> 8) & 255;
            $this->red = ($kwargs['rgb'] >> 16) & 255;
        }
        if (array_key_exists('red', $kwargs)) {
            $this->red = round($kwargs['red'], 0);
        }
        if (array_key_exists('green', $kwargs)) {
            $this->green = round($kwargs['green'], 0);
        }
        if (array_key_exists('blue', $kwargs)) {
            $this->blue = round($kwargs['blue'], 0);
        }
        if (Color::$verbose) {
            print ("$this constructed.").PHP_EOL;
        }
        return;   
    }

    public function __destruct() {
        if (Color::$verbose) {
            print("$this destructed.".PHP_EOL);
        return;
        }
    }
    public function __toString() {
        return 'Color( red: '.str_pad($this->red, 3, " ", STR_PAD_LEFT).', green: '.str_pad($this->green, 3, " ", STR_PAD_LEFT).', blue: '.str_pad($this->blue, 3, " ", STR_PAD_LEFT).' )';
    }

    public function add(Color $rhs) {
        return new Color(array('red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue));
    }
    public function sub(Color $rhs) {
        return new Color(array('red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue));
    }
    public function mult($f) {
        return new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f));
    }
    
    static function doc() {
        $doc = file_get_contents('Color.doc.txt')."\n";
        return $doc;
    }
}
?>