<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
<section id="main_section">
	<?php if(isset($_GET['logout'])){ session_destroy(); header('Location: ../errors?id=13'); }
  if(isset($_GET['profile'])){ checkLogin(); ?>
    <header><?php echo $VOCAB['header'];?></header>
    <p> <?php echo $VOCAB['p'];?></p>
    <p>
      <br><?php echo $VOCAB['welcome'].htmlspecialchars($_SESSION['name'])." ".htmlspecialchars($_SESSION['surname'])." !";?><br><br/>
      <ul>
      <li> <a href="/profile?logout=yes"> <?php echo $VOCAB['logout'];?> </a> <br/></li>
      <li> <a href="#desc" onclick = "tab_change(1)"> <?php echo $VOCAB['changedesc'];?> </a> <br/> </li>
      <li> <a href="#pass" onclick = "tab_change(2)" > <?php echo $VOCAB['changepass4'];?> </a> <br/> </li>
      <li> <a href="#img" onclick = "tab_change(3)" > <?php echo $VOCAB['changeimg'];?> </a> <br/> </li>
      </ul>
    </p>
    <form action=<?php echo htmlspecialchars($current_file)."?profile"?> method="POST" enctype="multipart/form-data">
      <div id = "tabs">
        <section id = "tab_1">
          <br /><textarea name="changedesc" rows=3 cols=50 value="<?php echo $_SESSION['description'];?>"></textarea><br />
          <br /><input type='submit' value='<?php echo $VOCAB['changedesc'];?>'></input><br />
        </section>
        <section id = "tab_2">
          <?php echo $VOCAB['changepass1'];?> <br/>
          <?php echo $VOCAB['changepass2'];?> <input type = "password" name = "oldpassword"></input> <br/>
          <?php echo $VOCAB['changepass3'];?> <input type = "password" name = "newpassword"></input> <br/>
          <input type='submit' value=' <?php echo $VOCAB['changepass4'];?> '> <br/>
        </section>
        <section id = "tab_3">
          <br/><input type="file" name="file"></input>
          <br/> <input type="submit" value=" <?php echo $VOCAB['changeimg'];?> "></input>
        </section>
      </div>
    </form>
    <?php if(isset($_POST['changedesc'])&&!empty($_POST['changedesc'])){zahtev( "UPDATE `users` SET `description`='".$_POST['changedesc']."' WHERE `email`='".$_SESSION['email']."'",17); $_SESSION['description']= $_POST['changedesc'];} 
      if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && !empty( $_POST['newpassword'] ) && !empty( $_POST['oldpassword'] ))md5($_POST['oldpassword']) == $_SESSION['password'] ? zahtev("UPDATE `users` SET `password` = '".md5($_POST["newpassword"])."'" , 0) : alert($VOCAB['wrongUserNameOrPassword']);
      if(isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'])) alert(( $_FILES['file']['size'] <10000000 && $_FILES['file']['type'] == "image/jpeg") ? move_uploaded_file( $_FILES['file']['tmp_name'] , $_SESSION['id'] ) ? $VOCAB['imageSuccess'] : $VOCAB['imageFail'] : $VOCAB['imageTooLarge']); }
  else if(isset($_GET['id'])){
    $result = mysql_fetch_array(zahtev( "SELECT * FROM `users` WHERE `id`=".$_GET['id'] ,17));?>
    <header>
      <img src="<?php echo $_GET['id'];?>" width=160 height=160 async defer/>
      <?php echo htmlspecialchars($result["name"])." ".htmlspecialchars($result["surname"]); ?>
    </header>
    <p>
      <?php echo htmlspecialchars($result["rank"]);?><br/>
      <em><?php echo htmlspecialchars($result["description"]);?></em>
    </p>
  <?php } else { ?>
    <header> <?php echo $VOCAB['usersList'];?> </header>
    <p>
      <?php echo $VOCAB['usersListDesc'];
      $query_run=zahtev( "SELECT `id`,`name`,`surname` FROM `users`" ,0);
      while($row = mysql_fetch_array($query_run)){?><a href="<?php echo "/profile?id=".$row['id'];?>"><?php echo $row['name']." ".$row['surname'];?></a><br/><?php } ?>
    </p><?php } ?>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>