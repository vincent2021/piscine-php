<?php

Class NightsWatch implements IFighter {
    
    private $list = array();

    public function fight() {
        foreach ($this->list as $Fclass) {
            if (class_implements($Fclass) == class_implements($this))
                $Fclass->fight();
        }
    }
    public function recruit($fighter) {
        $this->list[] = $fighter;
    }
}

?>