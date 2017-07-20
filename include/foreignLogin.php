<?php
require $_SERVER['DOCUMENT_ROOT'].'/include/core.inc.php';
$_GET['type']=$_SESSION['type'];
$query="SELECT * FROM `users` WHERE type ='".$_GET['type']."' AND email = '".$_GET['email']."'";
$query1="SELECT * FROM `users` WHERE email='".$_GET['email']."'";
if(mysql_num_rows(zahtev($query,0))==0){
	if(mysql_num_rows(zahtev($query1,0))==0){
		 $query="INSERT INTO `users` VALUES('','".mysql_real_escape_string($_GET['email'])."','".mysql_real_escape_string($_GET['url'])."','".mysql_real_escape_string($_GET['imgurl'])."','".mysql_real_escape_string($_GET['name'])."','".mysql_real_escape_string($_GET['surname'])."','".mysql_real_escape_string($_GET['description'])."','".mysql_real_escape_string($_GET['phone'])."','".$_GET['type']."')";
	   $query_run=zahtev($query,0);
	echo "v";
		}
	else alert("Već postoji korisnik s Vašim e-mailom registrovan. Za registraciju koristite standardnu formu.");
}
else{
  $_SESSION['email'] = $_GET['email'];
  $_SESSION['password'] = $_GET['url'];
  $_SESSION['ip'] = $_GET['imgurl'];
  $_SESSION['name'] = $_GET['name'];
  $_SESSION['surname'] = $_GET['surname'];
  $_SESSION['description'] = $_GET['description'];
  $_SESSION['phone'] = $_GET['phone'];
echo "a";
}
?>