<?PHP  
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Yet another 42 Phone Shop - Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<div class="logo">
		<a href="../index.php"><img id="logo" src="../img/42.png"/></a>
		<h1>Yet another<br/>42 Phone Shop</h1>
		<div class="account">
			<ul>
<?php
			if($_SESSION['loggued_on_user'])
			{
				echo "<li><a href='../myaccount.php'>Mon compte</li><br/>";
				echo "<li><a href='../logout.php'>Se déconnecter</a></li><br/>";
			}
			else
			{
				echo "<li><a href='../create.php'>Créer un compte</a></li><br/>";
				echo "<li><a href='../connect.php'>Se connecter</a></li><br/>";
			}
?>
			<li><a href='../basket.php'>Panier:
			<?php 
			if (!$_SESSION['nb_of_items'])
				$_SESSION['nb_of_items'] = 0;
			echo $_SESSION['nb_of_items'];
			if ($_SESSION['loggued_on_user'] == "admin")
				echo"<br/><li><a href='admin.php'>Admin</a></li>";?>
			</ul>
 		</div>
	</div>
	<div class="menu">
		<ul>
			<?php
			$tab = explode( ";", file_get_contents('../private/categories'));
			foreach ($tab as $value)
			{
				echo "<li><a href='../phone.php?cat=".$value."'>".$value."</a></li>";
			}
			?>		
		</ul>
	</div>
	<div class="admin">
