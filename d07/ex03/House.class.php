<?php

abstract Class House {

    abstract public function getHouseName();
    abstract public function getHouseMotto();
    abstract public function getHouseSeat();
    public function introduce() {
        print(get_class()." ".Static::getHouseName()." of ".Static::getHouseSeat()." : ".'"'.Static::getHouseMotto().'"'."\n");
        return;
    }
}
?>