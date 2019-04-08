<?php

class Jaime extends Lannister {
	public function sleepWith($pers) {
		if ($pers instanceof Cersei) {
			return print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
		}
		if ($pers instanceof Lannister) {
			return print("Not even if I'm drunk !".PHP_EOL);
		} else {
			return print("Let's do this.".PHP_EOL);
		}
   }
}
?>