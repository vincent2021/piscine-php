<?php session_start();
include ("header.php");
?>

<div id="create">
	<form action="check.php" method="post">
		Adresse E-mail: <input type="text" name="mail" value="" />
		<br />
		Mot de passe:  <input type="password" name="passwd" value="" />
		<br />
		Confirmation du mot de passe:  <input type="password" name="passwd1" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
</div>

<?php

if ($_SESSION['formerror'] == "1")
{
	echo "<p id='error'>Merci de remplir tous les champs.\n</p>";
	unset($_SESSION['formerror']);
}
else if ($_SESSION['mailerror'] == "1")
{
	echo "<p id='error'>Cette adresse mail est déjà utilisée.\n</p>";
	unset($_SESSION['mailerror']);
}
else if ($_SESSION['passwderror'] == "1")
{
	echo "<p id='error'>Les 2 mots de passe sont différents.\n</p>";
	unset($_SESSION['passwderror']);
}
else if ($_SESSION['create'] == "1")
{
	echo "<p id='create'>Inscription confirmée.\n</p>";
	echo "<a id='create' href='connect.php'>Connexion.</a>";
	unset($_SESSION['create']);
}
include ("footer.php")?>
