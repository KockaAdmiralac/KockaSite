<?php require $_SERVER['DOCUMENT_ROOT'].'/include/core.inc.php';?>
<html>
<head>
<title><?php echo $VOCAB['title']?></title>
<link rel="shortcut icon" href="/media/kocka.ico" async defer>
<link rel="stylesheet" type="text/css" href="/include/default.css" />
<meta charset="utf-8"/>
<meta author="KockaAdmiralac <1405223@gmail.com>"/>
<meta name="keywords" content="Kocka-Systems, Goldenson, cheap games"/>
<script src="/include/main.js"></script>
<script src="/include/jquery.js"></script>
<script src="https://apis.google.com/js/client:platform.js" async defer></script>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'sr'}
</script>
</head>
<body>
<div id="fb-root"></div>
<form method="GET" action="<?php echo $current_file;?>"></form>
	<div id="body">
	<header id="header">
		<img src="/media/kocka.bmp" id="logo1" async defer/>
		<?php echo $VOCAB['title']?>
		<div id="logo2">
		  <a href="/index.php?lang=en"><img src="/media/en.png" width=60 height=30 async defer/></a>
		  <a href="/index.php?lang=sr"><img src="/media/sr.png" width=60 height=30 async defer/></a><br/>
		</div>
		</form>
	</header>
	<nav>
		<ul>
			<li><a href="/"><?php echo $VOCAB['home'];?></a></li>
			<li><a href="/worker"> <?php echo $VOCAB['about'];?> </a></li>
			<li><a href="/kontakt.php"> <?php echo $VOCAB['contact'];?> </a></li>
			<li><a href="/forum.php"> <?php echo $VOCAB['forum'];?> </a></li>
			<li><a href="/profile?profile"> <?php echo $VOCAB['profile'];?> </a></li>
	</nav>
	<div id="bottom">