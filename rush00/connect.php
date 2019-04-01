<?php 
include ("header.php");
?>
<div id="connect">
	<form action="auth.php" method="post">
		Adresse E-mail: <input type="text" name="mail" value="" />
		<br />
		Mot de passe:  <input type="password" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
</div>

<?php

if ($_SESSION['log'] == 1)
{
	echo "<p>Bonjour ".$_SESSION['loggued_on_user']."!\n</p>";
	echo "<p>Vous êtes maintenant connecté, commencez votre shopping.</p>";
	unset($_SESSION['log']);
}
if ($_SESSION['logerror'] == 1)
{
	echo "<p>Les informations fournies sont incorrectes ou vous n'êtes pas encore inscrit..</p>";
	unset($_SESSION['logerror']);
}
include ("footer.php")
?>
