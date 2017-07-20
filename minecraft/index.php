<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
  <section id="main_section">
    <img src="/media/minecraft.jpg" id="logo2" async defer/>
    <header> <?php echo $VOCAB['header'];?> </header><br />
    <p>
      <div id="info"> <?php echo $VOCAB['info'];?> </div>
      <?php echo $VOCAB['desc'];?>
    </p>
    <p>
      <?php echo $VOCAB['alreadyWhitelisted'];?>
      <ul>
        <?php $query_run=zahtev( 'SELECT username FROM `minecraft` WHERE 1' ,14);
          while($result = mysql_fetch_array($query_run)){?><li><?php echo htmlspecialchars($result['name']);?></li><?php } 
          (isset($_GET['username']) && isset($_GET['message'])&&!empty($_GET['username']) &&!empty($_GET['message']) ) ? $_SESSION["rank"]=="Admin" ? zahtev( 'INSERT INTO `minecraft` VALUES("'.$_GET['username'].'")' , 0) : mail("email-stripped-from-repo@gmail.com","Whitelist", "https://kocka.dilfa.com/minecraft?username=".$_GET['username']."&message=".$_GET['message'] ,"From: admin@kockasystems.gov.yu") : (isset($_GET['username']) && isset($_GET['message'])&&empty($_GET['username']) &&empty($_GET['message']) ) ? alert("Popunite sva polja!") : $a =1;?>
      </ul>
    </p>
    <form action="<?php echo htmlspecialchars($current_file);?>" method=GET>
      <?php echo $VOCAB['name'];?> <br/><input type="text" name="username"></input><br/>
			 <?php echo $VOCAB['message'];?> <br/><textarea name="message"></textarea><br>
      <input type="submit" value="<?php echo $VOCAB['login'];?>" ></input>
    </form>
  </section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>