<?php
require_once 'Vertex.class.php';
require_once 'Color.class.php';
class Vector {

    public static $verbose = False;
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 0;

    public function __construct(array $kwargs) {
        if (!array_key_exists('orig', $kwargs)) {
            $kwargs["orig"] = new Vertex(array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0 ));
        }
        if (array_key_exists('dest', $kwargs)) {
            $this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
            $this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
            $this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
        }
        if (Vector::$verbose) {
            print ("$this constructed").PHP_EOL;
        }
        return;
    }
    public function __destruct() {
        if (Vector::$verbose) {
            print("$this destructed".PHP_EOL);
        }
        return;
    }
    public function __toString() {
        return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
    }
    public function getX() {return $this->_x;}
    public function getY() {return $this->_y;}
    public function getZ() {return $this->_z;}
    public function getW() {return $this->_w;}
    public function magnitude() {return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));}
    public function normalize() {
        $normalized['dest'] = new Vertex(array( 'x' => $this->_x/$this->magnitude(),
        'y' => $this->_y/$this->magnitude(),
        'z' => $this->_z/$this->magnitude()));
        return new Vector($normalized);
    }
    public function add($rhs) {    $added['dest'] = new Vertex(array( 'x' => $this->_x + $rhs->getX(),
        'y' => $this->_y + $rhs->getY(),
        'z' => $this->_z + $rhs->getZ()));
        return new Vector($added);
    }
    public function sub($rhs) {
        $minus['dest'] = new Vertex(array( 'x' => $this->_x - $rhs->getX(),
        'y' => $this->_y - $rhs->getY(),
        'z' => $this->_z - $rhs->getZ()));
        return new Vector($minus);
    }
    public function opposite() {
        $inverse['dest'] = new Vertex(array( 'x' => -$this->_x,
        'y' => -$this->_y,
        'z' => -$this->_z));
        return new Vector($inverse);
    }
    public function scalarProduct($k) {
        $scalar['dest'] = new Vertex(array( 'x' => $k * $this->_x,
        'y' => $k * $this->_y,
        'z' => $k * $this->_z));
        return new Vector($scalar);
    }
    public function dotProduct($rhs) {
        $dotP = $this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z;
        return $dotP;
    }
    public function cos($rhs) {
        $cosinus = $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
        return $cosinus;
    }
    public function crossProduct($rhs) {
        $cross['dest'] = new Vertex(array( 'x' => ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y),
        'y' => ($this->_z * $rhs->_x) - ($this->_x * $rhs->_z),
        'z' => ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x)));
        return new Vector($cross);
    }
    static function doc() {
        $doc = file_get_contents('Vector.doc.txt')."\n";
        return $doc;
    }
}
?>