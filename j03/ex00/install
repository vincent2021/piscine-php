#!/usr/bin/env bash
cd ~
mkdir http && mkdir http/MyWebSite
Remplacer les 8080 par 8100 (y a 2 occurences)
Ouvrir MAMP/php/etc/php.ini
modifier la ligne adequat pour avoir opcache.enable=0
------------OTHER------------
Ouvrir le fichier MAMP/apache2/conf/bitnami/bitnami.conf
Remplacer les 8080 par 8100 (y a 2 occurences)
Repérer les 2  <VirtualHost _default_:8XXX>
Modifier dans chacun des deux, les lignes DocumentRoot et <Directory... pour avoir:
DocumentRoot "/Users/votreLogin/http/MyWebSite"
<Directory "/Users/votreLogin/http/MyWebSite">

Ouvrir MAMP/php/etc/php.ini
modifier la ligne adequat pour avoir opcache.enable=0

Restart le serveur via manager-osx
