<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
@mysql_connect($dbhost, $dbuser, $dbpass) or die('on n\'pas pue etablire une connexion au serveur: ' . mysql_error());
mysql_select_db('ihm') or die('on n\'a pas pue connecter à la base.' .mysql_error());
?>