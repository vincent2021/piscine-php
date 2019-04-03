<?php
require_once 'Color.class.php';
class Vertex {

    public static $verbose = False;
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 1.0;
    private $_color;
    
    public function __construct(array $kwargs) {
        if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs)) {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
            if (array_key_exists('w', $kwargs)) {
                $this->_w = $kwargs['w'];
            }
            if (array_key_exists('color', $kwargs)) {
               $this->_color = $kwargs['color'];
            } else {
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
            }
            if (Vertex::$verbose) {
                print ("$this constructed").PHP_EOL;
            }
            return;
        }
    }
    public function __destruct() {
        if (Vertex::$verbose) {
            print("$this destructed".PHP_EOL);
        }
        return;
    }
    public function __toString() {
        if (Vertex::$verbose) {
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, $this->_color )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        } else {
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }
    }
    static function doc() {
        $doc = file_get_contents('Vertex.doc.txt')."\n";
        return $doc;
    }
    public function getX() {return $this->_x;}
    public function getY() {return $this->_y;}
    public function getZ() {return $this->_z;}
    public function getW() {return $this->_w;}
}
?>