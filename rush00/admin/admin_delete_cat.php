<?php
session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
if ($_POST['cat'] != "" && $_POST['submit'] == "OK") {
    $file = "../private/categories";
    $tab = explode(";", file_get_contents($file));
    foreach ($tab as $elem)
    {
        $data = fopen($file, 'w');
        foreach($tab as $elem)
        {
            if ($elem != $_POST['cat'])
                fwrite($data, $elem.";");
        }
        fclose($data);
      	$_SESSION['delcat'] = "OK";
        header('Location: admin_product.php');
        exit();
    }
}  
$_SESSION['delcat'] = "KO";
header('Location: admin_product.php');
?>
