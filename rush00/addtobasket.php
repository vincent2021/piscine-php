<?php 
session_start();
include('getcsv.php');
if (ft_stockmgmt($_GET['tel'], -1)) {
    $_SESSION['nb_of_items']++;
    $_SESSION['basket'][] = $_GET['tel'];
    header('Location: basket.php');
}
?>