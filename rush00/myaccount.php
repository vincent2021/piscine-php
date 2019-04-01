<?php
include('header.php');
?>
<div class = "admin"><h3 text-align="center">Bonjour <?php echo $_SESSION['mail'] ?></h3>
<br />
<p text-align="center"><a href="modifypasswd.php" >Modifier mon mot de passe</a></p>
<p text-align="center"><a href="deleteaccount.php" >Supprimer mon compte</a></p>
<br /><br /></div>
<?php
include('footer.php');
?>
