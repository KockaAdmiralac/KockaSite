<?php
require $_SERVER['DOCUMENT_ROOT']."/include/core.inc.php";
if(isset($_GET['message']) && !empty($_GET['message'])){
    zahtev("INSERT INTO `messages` VALUES('','".$_GET['message']."','".$_SESSION['name']." ".$_SESSION['surname']."')",0);
    header("Location: chat.php");
}
$string = "";
$query_run = zahtev("SELECT * FROM `messages`",0);
for($i=0;$i<mysql_num_rows($query_run);$i++)$string = $string . "<p>".mysql_result($query_run, $i, 'sender')." : ".htmlspecialchars(mysql_result($query_run,$i,'message'))."</p>";
echo $string;
?>