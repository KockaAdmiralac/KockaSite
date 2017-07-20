<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
<script type="text/javascript" src="/include/swfobject.js"></script>
<section id="main_section">
  <header> <?php echo $VOCAB['header'];?> </header>
  <p>  <?php echo $VOCAB['desc'];?> </p>
  <object width="500" height="700">
    <param name="movie" value="<?php echo isset( $_GET['game'] ) ? $_GET['game'].".swf" : "test.swf";?>" />
    <object type="application/x-shockwave-flash" data="<?php echo isset( $_GET['game'] ) ? $_GET['game'].".swf" : "test.swf";?>" width="300" height="120"/>
  </object>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>
