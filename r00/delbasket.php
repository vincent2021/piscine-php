<?php session_start();
include('getcsv.php');
ft_stockmgmt($_GET['tel'], 1);
$_SESSION['nb_of_items']--;
foreach ($_SESSION['basket'] as $key => $value)
{
	if ($value == $_GET['tel'])
	{
		unset($_SESSION['basket'][$key]);
		header('location: basket.php');
		exit();
	}
}
header('location: basket.php');
?>
