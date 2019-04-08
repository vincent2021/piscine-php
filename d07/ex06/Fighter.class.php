<?php

Abstract class Fighter {

    public $type;

    abstract public function fight($target);
    public function __construct($str) {
        $this->type = $str;
        return;
    }
}
?>