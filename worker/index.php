<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
$query_run = zahtev("SELECT * FROM `users` WHERE `rank`='Admin'", 0);?>
<section id="main_section">
  <article>
    <header><?php echo $VOCAB['header1'];?></header>
    <p> <?php echo $VOCAB['desc1'];?> </p>
  </article>
  <article>
    <header> <?php echo $VOCAB['header2'];?> </header>
    <p> <?php echo $VOCAB['desc2'];?> </p>
  </article>
  <article>
    <header> <?php echo $VOCAB['header3'];?> </header>
    <p>
      <?php echo $VOCAB['desc3'];?>
      <ul id="workers">
		<!-- Workers' real names have been stripped from the repo -->
      </ul>
    </p>
  </article>
  <div id="tabs">
    <!-- Workers' personal information has been stripped from the repo -->
  </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>