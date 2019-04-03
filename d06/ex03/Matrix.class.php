<?php
require_once "Vector.class.php";

class Matrix {
    
    private $matrix = array();
    public static $verbose = False;
    const IDENTITY = "IDENTITY";
    const TRANSLATION = "TRANSLATION";
    const SCALE = "SCALE";
    const RX ="Ox ROTATION";
    const RY ="Oy ROTATION";
    const RZ ="Oz ROTATION";
    const PROJECTION = "PROJECTION";

    public function __construct($kwargs) {
        if ($kwargs['preset'] == self::IDENTITY)
            $this->matrix = array(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        if ($kwargs['preset'] == self::TRANSLATION && isset($kwargs['vtc']))
            $this->matrix = array(1, 0, 0, $kwargs['vtc']->getX(), 0, 1, 0, $kwargs['vtc']->getY(), 0, 0, 1, $kwargs['vtc']->getZ(), 0, 0, 0, 1);
        if ($kwargs['preset'] == self::SCALE && isset($kwargs['scale'])) {
            $k = $kwargs['scale'];
            $this->matrix = array(1 * $k, 0, 0, 0, 0, 1 * $k, 0, 0, 0, 0, 1 * $k, 0, 0, 0, 0, 1);
        }
        if ($kwargs['preset'] == self::RX && isset($kwargs['angle'])) {
            $cos = cos($kwargs['angle']);
            $sin = sin($kwargs['angle']);
            $this->matrix = array(1, 0, 0, 0, 0, $cos, -$sin, 0, 0, $sin, $cos, 0, 0, 0, 0, 1);
        }
        if ($kwargs['preset'] == self::RY && isset($kwargs['angle'])) {
            $cos = cos($kwargs['angle']);
            $sin = sin($kwargs['angle']);
            $this->matrix = array($cos, 0, $sin, 0, 0, 1, 0, 0, -$sin, 0, $cos, 0, 0, 0, 0, 1);
        }
        if ($kwargs['preset'] == self::RZ && isset($kwargs['angle'])) {
            $cos = cos($kwargs['angle']);
            $sin = sin($kwargs['angle']);
            $this->matrix = array($cos, -$sin, 0, 0, $sin, $cos, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        }
        if ($kwargs['preset'] == self::PROJECTION && isset($kwargs['fov']) && isset($kwargs['ratio']) && isset($kwargs['near']) && isset($kwargs['far'])) {
            $n = $kwargs['near'];
            $f = $kwargs['far'];
            $t = tan(deg2rad($kwargs['fov']) / 2) * $n;
            $r = $kwargs['ratio'] * $t;
            $b = -$t;
            $l = -$r;
            $this->matrix = array(2 * $n / ($r - $l), 0, 0, 0, 0, 2 * $n / ($t - $b), 0, 0, ($r + $l) / ($r - $l), ($t + $b) / ($t - $b), -($f + $n) / ($f - $n), -2 * $f * $n / ($f - $n), 0, 0, -1, 0);
        }
        if (isset($kwargs['mult'])) {
            $this->matrix = $kwargs['mult'];
        }
        if (Matrix::$verbose) {
            print ("Matrix ".$kwargs['preset']." preset instance constructed").PHP_EOL;
        }
        return;
    }
    public function __destruct() {
        if (Matrix::$verbose) {
            print ("Matrix instance destructed").PHP_EOL;
        }
        return;
    }
    public function __toString() {
        return (vsprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %0.2f | %0.2f | %0.2f | %0.2f\ny | %0.2f | %0.2f | %0.2f | %0.2f\nz | %0.2f | %0.2f | %0.2f | %0.2f\nw | %0.2f | %0.2f | %0.2f | %0.2f\n", $this->matrix));
    }
    static function doc() {
        $doc = file_get_contents('Matrix.doc.txt')."\n";
        return $doc;
    }
    public function mult($rhs) {
        $m1 = $this->matrix;
        $m2 = $rhs->getMATRIX();
        $new['mult'] = array($m1[0] * $m2[0] + $m1[1] * $m2[4] + $m1[2] * $m2[8] + $m1[3] * $m2[12],
                             $m1[0] * $m2[1] + $m1[1] * $m2[5] + $m1[2] * $m2[9] + $m1[3] * $m2[13],
                             $m1[0] * $m2[2] + $m1[1] * $m2[6] + $m1[2] * $m2[10] + $m1[3] * $m2[14],
                             $m1[0] * $m2[3] + $m1[1] * $m2[7] + $m1[2] * $m2[11] + $m1[3] * $m2[15],
                             $m1[4] * $m2[0] + $m1[5] * $m2[4] + $m1[6] * $m2[8] + $m1[7] * $m2[12],
                             $m1[4] * $m2[1] + $m1[5] * $m2[5] + $m1[6] * $m2[9] + $m1[7] * $m2[13],
                             $m1[4] * $m2[2] + $m1[5] * $m2[6] + $m1[6] * $m2[10] + $m1[7] * $m2[14],
                             $m1[4] * $m2[3] + $m1[5] * $m2[7] + $m1[6] * $m2[11] + $m1[7] * $m2[15],
                             $m1[8] * $m2[0] + $m1[9] * $m2[4] + $m1[10] * $m2[8] +  $m1[11] * $m2[12],
                             $m1[8] * $m2[1] + $m1[9] * $m2[5] + $m1[10] * $m2[9] +  $m1[11] * $m2[13],
                             $m1[8] * $m2[2] + $m1[9] * $m2[6] + $m1[10] * $m2[10] + $m1[11] * $m2[14],
                             $m1[8] * $m2[3] + $m1[9] * $m2[7] + $m1[10] * $m2[11] + $m1[11] * $m2[15],
                             $m1[12] * $m2[0] + $m1[13] * $m2[4] + $m1[14] * $m2[8] +  $m1[15] * $m2[12],
                             $m1[12] * $m2[1] + $m1[13] * $m2[5] + $m1[14] * $m2[9] +  $m1[15] * $m2[13],
                             $m1[12] * $m2[2] + $m1[13] * $m2[6] + $m1[14] * $m2[10] + $m1[15] * $m2[14],
                             $m1[12] * $m2[3] + $m1[13] * $m2[7] + $m1[14] * $m2[11] + $m1[15] * $m2[15]);
        return new Matrix($new);
    }
    public function transformVertex($vtx) {
        $x = $vtx->getX();
        $y = $vtx->getY();
        $z = $vtx->getZ();
        $w = $vtx->getW();
        $m1 = $this->matrix;
        $transformed = array('x' => $m1[0] * $x + $m1[1] * $y + $m1[2] * $z + $m1[3] * $w,
                             'y' => $m1[4] * $x + $m1[5] * $y + $m1[6] * $z + $m1[7] * $w,
                             'z' => $m1[8] * $x + $m1[9] * $y + $m1[10] * $z + $m1[11] * $w,
                             'w' => $m1[12] * $x + $m1[13] * $y + $m1[14] * $z + $m1[15] * $w);
        return new Vertex($transformed);
    }
    public function getMATRIX() {
        return $this->matrix;
    }
}
?>