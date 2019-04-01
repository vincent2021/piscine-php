<?PHP
session_start();
include('admin_header.php');
?>
<h2>Liste des utilisateurs</h2>
<?PHP
$path = "../private";
$file = $path."/account";
if (!file_exists($file))
	echo "<p>Aucun utilisateur n'est inscrit actuellement</p>";
else
{
	$unserialized = unserialize(file_get_contents($file));
	echo "<div id='tab_admin'>";
	echo "<table>";
	echo "<tr>
		<th>Mail</th>
		</tr>";
	foreach ($unserialized as $elem)
	{
		echo "<tr>
			<td>".$elem['mail']."</td>
			</tr>";
	}
	echo "</table>";
	echo "</div>";
}
?>
<br/><h2>Définir un utilisateur comme Admin</h2>
	<form method="post" action="admin_upgrade_user.php">
	Entrer l'e-mail de l'utilisateur : <input type="text" name="mail"/>
	<input type="submit" name = "submit" value="OK" />
	</form>
	<?php
if (isset($_SESSION['upgrade_user']) && $_SESSION['upgrade_user'] == "KO")
{
	echo "<p id='error'>Les informations fournies sont incorrectes.\n</p>";
	$_SESSION['upgrade_user'] = "";
	unset($_SESSION['upgrade_user']);
}
else if (isset($_SESSION['upgrade_user']) && $_SESSION['upgrade_user'] == "OK")
{
	echo "<div id='upgrade'>Upgrade effectuée !</div>";
	$_SESSION['upgrade_user'] = "";
	unset($_SESSION['upgrade_user']);
}
?>
<br/><h2>Supprimer un utilisateur</h2>
<p>Entrez l'adresse e-mail de l'utilisateur que vous souhaitez supprimer :</p>
<form method="post" action="admin_delete_user.php">
e-mail: <input type="text" name="mail"/>
<input type="submit" name = "submit" value="OK" />
</form>

<?php
if (isset($_SESSION['delete_user']) && $_SESSION['delete_user'] == "OK")
{
	echo "<p id='inscription-ok'>Utilisateur supprimé</p>";
	$_SESSION['delete_user'] = "";
}
else if (isset($_SESSION['delete_user']) && $_SESSION['delete_user'] == "KO")
{
	echo "<p id='error'>Erreur : aucun utilisateur trouvé avec cette adresse mail</p>";
	$_SESSION['delete_user'] = "";
}
include('admin_footer.php');
?>

