<?php
session_start();
include('getcsv.php');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style type="text/css">
body
{
font-family: arial;
font-size: 12pt;
}

h1
{
font-size: 14pt;
}

table
{
border-collapse: separate;
border-spacing: 10px 10px;
}

th, td
{
font-size: 10pt;
}

th
{
font-style: italic;
color: #3D3D3D;
}

.bordered
{
padding: 2px;
border: 1px solid #000000;
}

</style>
<title>Facture</title>

<body onLoad="window.print()">
<script language="javascript">
window.print()
</script>
 
</head>
<body>
<h1
style="font-family: Eurostile; color: orange; text-align: left;">42 Phone Shop
</h1>
<p><small>96 Bd Bessiere</small><br>
Mail : cpayen@student.42.fr</small></p>
<p><small><b>SIRET: </b>15668798745</small></p>
<p><small><b>À</b></small><br>
</p>
<p style="text-align: center;">
<?php 
$ordernumber = $_SESSION['order']['id'];
unset($_SESSION['order']['id']);
foreach ($_SESSION['order'] as $elem)
        echo $elem."<br>";
?>
<br></p>
<small><b>Date :</b><?php date_default_timezone_set('Europe/Paris'); echo date("j F y");?></small>
<table style="text-align: left; width: 530px; height: 131px;" border-size="0">
<tbody>
<tr>
<th>Description</th>
<th>Quantité</th>
<th>Prix</th>
<th
style="text-align: center; background-color: orange;">Total<br>
</th>
</tr>
<?php
$boutique = ft_getcsv();
foreach ($_SESSION['basket'] as $value)
{
	foreach ($boutique as $key => $data) {
		if ($data[0] == $value) {
			echo "<tr><td>".$boutique[$key][1]."</td><td>1</td><td>".$boutique[$key][3]."</td></tr>";
			$total += $boutique[$key][3];
		}
	}
}
?>
<td colspan="4" style="text-align: right; height: 30px;"><?php echo $total;?><br>
<br>
</td>
</tr>
</tbody>
</table>
<small><b>TVA non applicable, art. 293 B du CGI</b></small>
<p style="text-align: center; color: orange;"><b>Total en
votre aimable règlement :</b><?php echo $total."Euros." ?></p>
<small><span style="text-decoration: underline; font-style: italic;">Conditions&nbsp;:
Règlement à réception par chèque ou virement </span><small><br>
<br>
Banque :<br>
Boursorama banque </small><br>
<br>
<small>Merci de payer vite, très vite. </small><br>
<small><br>
</small></small>
<div style="text-align: center;"><small><small>42 Phone Shop</small><br>
<small>vimucchi & cpayen</small></small><br>
</div>
</body>
</html>