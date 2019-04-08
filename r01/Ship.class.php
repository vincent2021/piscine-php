<?php
require_once 'IShip.class.php';
class Ship implements IShip
{
	public $team; // Quel cote
	public $id;
	public $name; // Cool name
	public $width; // Largeur du vaisseau
	public $length; // Longueur du vaisseau
	public $imgid; // Image to load
	public $hp; // Points de vie
	public $maxhp; // Points de vie
	public $pp; // Puissance de moteur
	public $maxpp; // Puissance de moteur
	public $speed; // Vitesse
	public $manu; // Manoeuvrabilite
	public $shield; // Bouclier
	public $wpns; // array d'armes
	public $x;
	public $y;
	public $rot;

	function __construct(array $kwargs)
	{
		if (!array_key_exists('name', $kwargs) || !array_key_exists('width', $kwargs) || !array_key_exists('length', $kwargs)
		|| !array_key_exists('imgid', $kwargs) || !array_key_exists('hp', $kwargs) || !array_key_exists('pp', $kwargs) || !array_key_exists('team', $kwargs)
		|| !array_key_exists('speed', $kwargs) || !array_key_exists('manu', $kwargs) || !array_key_exists('id', $kwargs)
		|| !array_key_exists('x', $kwargs) || !array_key_exists('y', $kwargs))
		{
			print("Error missing arguments" . PHP_EOL);
			return (0);
		}
		$this->name = $kwargs['name'];
		$this->width = $kwargs['width'];
		$this->length = $kwargs['length'];
		$this->imgid = $kwargs['imgid'];
		$this->hp = $kwargs['hp'];
		$this->maxhp = $kwargs['hp'];
		$this->pp = $kwargs['pp'];
		$this->maxpp = $kwargs['pp'];
		$this->speed = $kwargs['speed'];
		$this->manu = $kwargs['manu'];
		$this->team = $kwargs['team'];
		$this->id = $kwargs['id'];
		$this->x = $kwargs['x'];
		$this->y = $kwargs['y'];
		$this->rot = ($this->team == 1 ? 3 : 1);
		//$this->wpns = $kwargs['wpns'];
	}
	function getSize()
	{
		$tmp['w'] = $this->width;
		$tmp['l'] = $this->length;
		return ($tmp);
	}
	function getRotation()
	{
		return ($this->rot);
	}
	function setRotation($newrot)
	{
		if ($newrot && $newrot < 5 && ($this->rot = $newrot + 1 || $this->rot = $newrot - 1))
		{
			$this->rot = $newrot;
			if ($this->rot == 1)
				$this->y -= floor($this->length / 3);
			else if ($this->rot == 2)
				$this->x += floor($this->length / 3);
			else if ($this->rot == 3)
				$this->y += floor($this->length / 3);
			else if ($this->rot == 4)
				$this->x -= floor($this->length / 3);
		}
	}
	function moveForward($trust)
	{
		if ($this->rot == 1)
			$this->y -= $trust;
		else if ($this->rot == 2)
			$this->x += $trust;
		else if ($this->rot == 3)
			$this->y += $trust;
		else if ($this->rot == 4)
			$this->x -= $trust;
	}
	function useEnergy($needpp)
	{
		if (abs($needpp) <= $this->pp)
		{
			$this->pp -= abs($needpp);
			return (true);
		}
		return (false);
	}
	function getEnergy()
	{
		return ($this->pp);
	}
	function refuelEnergy()
	{
		$this->pp = $this->maxpp;
	}
	function setID($id)
	{
		$this->id = $id;
	}
	function getID()
	{
		return ($this->id);
	}
	function setteam($team)
	{
		$this->team = $team;
	}
	public static function doc()
	{
		return (PHP_EOL . file_get_contents("Ship.doc.txt", true));
	}
}
?>
