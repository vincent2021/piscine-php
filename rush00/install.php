<?php
$folder = "private";
$filepath = $folder . "/account";
if (!file_exists($folder))
	mkdir($folder);
$tab[0]['mail'] = "admin";
$tab[0]['passwd'] = hash('whirlpool', "admin");
$tab[0]['admin'] = "Y";
file_put_contents($filepath, serialize($tab));
file_put_contents("private/.htaccess", "deny from all\n");
file_put_contents($folder . '/product.csv', "id,téléphone,catégorie,prix,quantité,img
1,Iphone 5s,Iphone,345,3994,img/iphone5.jpg
2,Iphone 6,Iphone,627,0,img/iphone6.jpg
3,Iphone X,Iphone,1100,0,img/iphonex.jpg
4,Samsung galaxy S8,Android,550,7,img/s8.jpg
5,Huawei P20,Android;Promotion,500,8,img/p20.jpg
6,Asus Zenfone 2,Android;Petit Budget,200,2,img/zenfone.jpg
7,Wiko View2,Android;Promotion;Petit Budget,150,20,img/wiko.jpg
8,Iridium 9575,Satellite,1400,2,img/iridium.jpg
9,Thuraya X,Satellite,999,1,img/thuraya.jpg\n");
file_put_contents("private/categories", 'Android;Iphone;Satellite;Petit Budget;Promotion');
if (file_exists($folder . "/.htaccess") && file_exists($folder . "/account") && file_exists($folder . "/product.csv") && file_exists($folder . "/categories"))
	echo 'Installation OK<br><a href="index.php">Visiter le site</a>';
file_put_contents(".htaccess", "<Files install.php>
Order Allow,Deny
Deny from all
</Files>");
?>
