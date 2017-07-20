<?php $conf = parse_ini_file(substr($_SERVER['DOCUMENT_ROOT'], 0, -5)."kocka.ini", true);
if(session_start()){
	$_SESSION['lang'] = isset($_SESSION['lang']) ? isset($_GET['lang']) ? $_GET['lang'] : $_SESSION['lang'] : "sr";
	$current_file=$_SERVER['SCRIPT_NAME'];
    if(!isset($_SESSION['ip']) || $_SESSION['ip'] == 0)$_SESSION['ip'] = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "127.0.0.1";
    mysql_connect($conf['DB']['hostname'],$conf['DB']['username'],$conf['DB']['password']) ? mysql_select_db($conf['DB']['database']) ? $a = 1 : alert("Can't select database"):alert("Can't connect to database");
    $xml = new DOMDocument();
    if(!$xml->load( $_SERVER['DOCUMENT_ROOT']."/".$conf['DIR']['lang']."/".$_SESSION['lang'].".xml" ))alert("XMLParseError");
    if(empty($VOCAB) or !isset( $VOCAB )) foreach($xml->documentElement->childNodes as $node)if($node->nodeName == str_replace("/","-",substr($current_file, 1 , -4)) || $node->nodeName == "globalVocab") foreach($node->childNodes as $item) if($item->nodeName != "#text") $VOCAB[$item->nodeName] = html_entity_decode($item->nodeValue);
}
else error(3);
function error($id){header('Location: /'.$conf['DIR']['errors']."/?id=".$id);}
function alert($i){ ?><script> alert('<?php echo $i;?>');</script><?php }
function zahtev($query, $error){ if(!$run=mysql_query($query)) alert($error); file_put_contents($_SERVER['DOCUMENT_ROOT']."/include/sql.txt",file_get_contents( $_SERVER['DOCUMENT_ROOT']."/include/sql.txt" ). "IP : ".$_SESSION['ip']."\nDate : ".date("d-m-Y")."\nQuery : ". $query."\nFile : ".$_SERVER['SCRIPT_NAME']."\n\n") ;return $run;}
function checkLogin(){if(!isset($_SESSION['id'])||empty($_SESSION['id'])){$_SESSION['redir']=stripslashes($_SERVER['SCRIPT_NAME']); header('Location: /profile/login.php');}}
function checkAdmin(){checkLogin(); if(!$_SESSION['rank']=="Admin")header("Location: /errors/404.php");}?>
