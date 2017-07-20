<?php if(isset($_GET['reconstruction'])) $_SESSION['reconstruction'] = $_GET['reconstruction'];
if((!isset($_SESSION['reconstruction'])) && @$conf['GLOBAL']['reconstruction'] == 1) die("This site is under reconstruction. If you still want to proceed, click <a href='".$_SERVER['DOCUMENT_ROOT']."/index.php?reconstruction=on'>here</a>");
require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
<section id="main_section">
		<article>
			<header> <?php echo $VOCAB['header'];?> </header>
			<p><?php echo $VOCAB['desc'];?></p>
			<p><?php echo $VOCAB['desc2'];?></p>
			<p><!--<br />Našu reklamu možete videti <a href="video/?video=goldenson">ovde</a>--></p>
		</article>
	</section>
	<aside id="side_section">
		<h2><?php echo $VOCAB['news_title'];?></h2>
		<?php if(@$_SESSION['rank']=="Admin"){?>
			<form action='index.php?reconstruction=on' method=POST>
			  <input type="text" name="title" width:1%></input>
			  <input type="text" name="text"></input>
       <input type="submit" value="Objavi"></input>
     </form>
    <?php if(isset($_POST['title']) && isset( $_POST['text'] ) && !empty($_POST['title']) && !empty($_POST['text']))zahtev( "INSERT INTO `news` VALUES('". $_POST['title'] ."','". $_POST['text'] ."','". $_SESSION['name']." ".$_SESSION['surname'] ."')" ,0);}
    $query_run=zahtev( "SELECT * FROM `news`" ,0);
    while($result = mysql_fetch_array($query_run)){?>
      <article>
			   <header><?php echo htmlspecialchars($result['title']);?></header>
			   <p><?php echo htmlspecialchars($result['text']);?></p>
			   <footer><?php echo htmlspecialchars($result['footer']);?></footer>
		   </article>
    <?php } ?>
	</aside>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>