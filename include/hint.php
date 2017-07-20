<?php
require $_SERVER['DOCUMENT_ROOT'].'/include/core.inc.php';
if($result=mysql_fetch_array(zahtev("SELECT * FROM users WHERE email='".mysql_real_escape_string($_GET['u'])."' AND password='".md5($_GET['p'])."'",0))){$_SESSION += $result; echo "<input type='submit' value='".$VOCAB['login']."'></input>";}
else echo $VOCAB['wrongUserNameOrPassword'];
?>