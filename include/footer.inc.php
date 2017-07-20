</div>
<div id="m_nav">
  <ul>
    <a href="/index.php" onmouseover=nav_show(1) onmouseout=nav_hide(1)><li> <?php echo $VOCAB['home'];?> </li></a>
    <a href="/worker" onmouseover=nav_show(2) onmouseout=nav_hide(2)><li> <?php echo $VOCAB['about'];?> </li></a>
    <a href="/kontakt.php" onmouseover=nav_show(3) onmouseout=nav_hide(3)><li> <?php echo $VOCAB['contact'];?> </li></a>
    <a href="/forum.php" onmouseover=nav_show(4) onmouseout=nav_hide(4)><li> <?php echo $VOCAB['forum'];?> </li></a>
    <a href="/profile?profile" onmouseover=nav_show(5) onmouseout=nav_hide(5)><li> <?php echo $VOCAB['profile'];?> </li></a>
	</ul>
</div>
</div>
<footer id="footer">
  <?php echo "Copyright &copy; ".$VOCAB['title']." ".date("Y").". ".$VOCAB['copyright'];?>
  <div class="g-plusone" data-callback="kliknu" data-href="https://plus.google.com/103794812649870343020"></div>
  <div class="fb-like" data-href="https://www.facebook.com/pages/Kocka-Systems/572400259562391" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
</footer>
</div>
</body>
</html>
<?php if(!isset($_SESSION['good']))mysql_num_rows( zahtev( "SELECT `ip` FROM `banip` WHERE `ip`='". $_SESSION['ip'] ."'" ,8)) !=0 ? header('Location: errors?id=9') : $_SESSION['good'] = "yes";
if(!isset($_COOKIE['good']))mysql_num_rows( zahtev( "SELECT `ip` FROM `ip` WHERE `ip`='".$_SESSION['ip']."'" ,8) )==0 ? zahtev( "INSERT INTO `ip` VALUES('". $_SESSION['ip'] ."')" ,8) : setcookie('good','yes' ,360000000, '/', "kocka.dilfa.com", false);?>
