<?php
session_start();
include('admin_header.php');
?>
<div id="admin">
	<br/>
	<ul>
		<li><a href="admin_user.php">Upgrader ou Supprimer un utilisateur</a></li><br/><br/>
		<li><a href="admin_product.php">Ajouter ou supprimer un produit / une catégorie.</a></li><br/><br/>
		<li><a href="admin_order.php">Voir la liste des commandes.</a></li><br/>
	<ul>
</div >
<br/>
<?php
include('admin_footer.php');
?>
