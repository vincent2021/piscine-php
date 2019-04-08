<?php

Class Tyrion extends Lannister {
    public function sleepWith($pers) {
        if ($pers instanceof Lannister) {
            return print("Not even if I'm drunk !".PHP_EOL);
        } else {
            return print("Let's do this.".PHP_EOL);
        }
    }
}
?>