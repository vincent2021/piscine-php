<?PHP
session_start();
include('admin_header.php');
?>
<h2>Liste des commandes</h2>
<?PHP
$path = "../private";
$file = $path."/order";
if (!file_exists($file) || filesize($file) == 0)
	echo "<p>Aucune commande passée sur le site.</p>";
else
{
	$unserialized = unserialize(file_get_contents($file));
	echo "<div id='tab_admin'>";
	echo "<table>";
    echo "<tr><th>Id:</th><th>Nom:</th><th>Prénom:</th><th>Adresse:</th><th>Code postal:</th><th>Ville:</th><th>Téléphone:</th></tr>";
    foreach ($unserialized as $key => $elem)
    {
        echo "<tr><td>".$key."</td>";
        echo "<td>".$unserialized[$key]['nom']."</td>";
        echo "<td>".$unserialized[$key]['prenom']."</td>";
        echo "<td>".$unserialized[$key]['adresse']."</td>";
        echo "<td>".$unserialized[$key]['cp']."</td>";
        echo "<td>".$unserialized[$key]['ville']."</td>";
        echo "<td>".$unserialized[$key]['tel']."</td></tr>"; 
    }
	echo "</table>";
	echo "</div>";
}
?>


<br/><h2>Supprimer une commande</h2>
<br/><p>Entrez l'id de la commande que vous souhaitez supprimer :</p>
<form method="post" action="admin_delete_order.php">
Id: <input type="text" name="id"/>
<input type="submit" name = "submit" value="OK" />
</form>

<?php
if ($_SESSION['delete_order'] == "OK")
{
	echo "<p id='inscription-ok'>Commande supprimée</p>";
	$_SESSION['delete_order'] = "";
}
else if ($_SESSION['delete_order'] == "KO")
{
	echo "<p id='error'>Erreur : aucune commande trouvée avec cet id.</p>";
	$_SESSION['delete_order'] = "";
}
include('admin_footer.php');
?>
