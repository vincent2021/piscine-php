<?php
require_once "Matrix.class.php";

class Camera {

    public static $verbose = False;
    private $origin;
    private $tT;
    private $tR;
    private $mult;
    private $Proj;

    public function __construct($kwargs){
        if (isset($kwargs['origin'])) {
            $this->origin = $kwargs['origin'];
            $v = new Vector(array('dest' => $this->origin));
            $oppv = $v->opposite();
            $this->tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $oppv));
        }
        if (isset($kwargs['orientation'])) {
            $this->tR = $kwargs['orientation'];
        }
        $this->mult = $this->tR->mult($this->tT);
        if (isset($kwargs['ratio']) && isset($kwargs['fov']) && isset($kwargs['near']) && isset($kwargs['far'])) {
            $this->Proj = new Matrix(array('preset' => Matrix::PROJECTION, 'ratio' => $kwargs['ratio'], 'fov' => $kwargs['fov'], 'near' => $kwargs['near'], 'far' => $kwargs['far']));
        } else if (isset($kwargs['width']) && isset($kwargs['height']) && isset($kwargs['fov']) && isset($kwargs['near']) && isset($kwargs['far'])) {
            $this->Proj = new Matrix(array('preset' => Matrix::PROJECTION, 'ratio' => $kwargs['width']/$kwargs['height'], 'fov' => $kwargs['fov'], 'near' => $kwargs['near'], 'far' => $kwargs['far']));
        }
        if (Camera::$verbose) {
            print("Camera instance constructed".PHP_EOL);
        }
        return;
    }
    public function __destruct() {
        if (Camera::$verbose) {
            print("Camera instance destructed".PHP_EOL);
        }
        return;
    }
    public function __toString() {
        return sprintf("Camera(\n+Origine %s\n+ tT:\n%s+ tR:\n%s+ tR->mult( tT ):\n%s+ Proj:\n%s)", $this->origin, $this->tT, $this->tR, $this->mult, $this->Proj);
    }
    public function watchVertex($worldVertex) {
        $screen['x'] = ($worldVertex->getX()) * ($kwargs['width'] / 2);
        $screen['y'] = ($worldVertex->getY()) * ($kwargs['height'] / 2);
        $screen['z'] = 0;
        return (new Vertex($screen));
    }
    static function doc() {
        $doc = file_get_contents('Camera.doc.txt')."\n";
        return $doc;
    }
}
?>