<?php
header('Content-type: image/jpeg');
require $_SERVER['DOCUMENT_ROOT'].'/include/core.inc.php';
$_SESSION['secure']=rand(1000,9999);
$image=imagecreate($conf['GLOBAL']['captcha_width'], $conf['GLOBAL']['captcha_height'] );
imagecolorallocate($image,255,255,255);
imagettftext($image, $conf['GLOBAL']['captcha_font_size'] ,0,15,30, imagecolorallocate($image,0,0,0) ,$_SERVER['DOCUMENT_ROOT'].'/media/PUD.TTF',$_SESSION['secure']);
imagejpeg($image);
?>