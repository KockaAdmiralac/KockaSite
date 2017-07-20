<?php require 'core.inc.php';
$result = mysql_fetch_array(zahtev("SELECT * FROM `users` WHERE `email`='".$_GET['username']."' AND `password`='".md5($_GET['password'])."'", 0));
echo $result['name']."///".$result['surname']."///".$result['rank']."///".$result['description'];?>