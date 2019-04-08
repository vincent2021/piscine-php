<?php

Class Tyrion extends Lannister {
    
	public function __construct() {
		parent::__construct();
		print ("My name is ".get_class()."\n");
	}
	public function getSize() {
		return "Short";
	}
}
?>