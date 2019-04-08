<?php

Class UnholyFactory {

    private $_soldier = array();
    private $_actualSoldier;
        
    public function absorb($fClass) {
        $name = $fClass->type;
        if (!isset($this->_soldier[$name]) && isset($name)) {
            $this->_soldier[$name] = $fClass;
            print "(Factory absorbed a fighter of type ".$name.")\n";
        } else if (isset($name)) {
            print "(Factory already absorbed a fighter of type ".$name.")\n";
        } else if (!isset($name)) {
            print "(Factory can't absorb this, it's not a fighter)\n";
        }
        return;
    }
    public function fabricate($type) {
        if (isset($this->_soldier[$type])) {
            $this->_actualSoldier = $this->_soldier[$type];    
            print "(Factory fabricates a fighter of type ".$type.")\n";
        } else {
            print "(Factory hasn't absorbed any fighter of type ".$type.")\n";
        }
        return $this->_actualSoldier;
    }
}
?>