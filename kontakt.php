<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
  <section id="main_section">
    <header> <?php echo $VOCAB['header'];?></header>
    <p><?php echo $VOCAB['contactHeader'];?><br />
      <ul>
		<!-- Worker's real names have been stripped from the repo -->
      </ul>
    </p>
    <header><?php echo $VOCAB['formHeader'];?></header>
    <p><?php echo $VOCAB['formDesc'];?></p>
    <form action="<?php echo htmlspecialchars($current_file);?>" method="POST">
      <?php echo $VOCAB['name'];?> <input type="text" name="name" size="50" maxlength="50"></input><br />
      <?php echo $VOCAB['email'];?> <input type="text" name="email" size="50" maxlength="50"></input><br />
      <?php echo $VOCAB['message'];?> <br />
      <textarea rows=10 cols=48 name="message"></textarea><br /><br />
      <input type="submit" value="<?php echo $VOCAB['send'];?>" maxlength="1000"></input><br />
    </form>
    <?php if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['message'])&&!empty($_POST['email'])&&!empty($_POST['name'])&&!empty($_POST['message'])) if(!mail('stripped-from-the-repo@gmail.com', 'Contact form' , "From:".$_POST['name'].$_POST['message'] , "From: ".$_POST['email'] )) header('Location: ../errors?id=12');
    else if( isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['message'])&&empty($_POST['email'])&&empty($_POST['name'])&&empty($_POST['message']))alert($VOCAB['fillInAllFields']);?>
  </section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>