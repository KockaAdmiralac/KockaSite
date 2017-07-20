<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
checkLogin();?>
<section id="main_section">
  <?php if(!isset($_GET['post_id']) && !isset($_GET['forum_id']) ){ ?>
		<header> <?php echo $VOCAB['header1'];?> </header>
		<p><?php echo $VOCAB['desc1'];?></p>
		<?php for($i = 0; $i < $conf['GLOBAL']['forums']; $i++){ ?><a href="forum.php?forum_id=<?php echo $i+1;?>"> <?php echo $VOCAB['forum'.($i+1)];?> </a><br><?php }}
  else if(isset($_GET['forum_id']) && !isset($_GET['post_id']) && $_GET['forum_id'] <= $conf['GLOBAL']['forums']){ ?>
    <header><?php echo $VOCAB["forum".$_GET['forum_id']];?></header>
    <p><?php echo $VOCAB["desc".$_GET['forum_id']];?></p> <?php
    $query_run=zahtev( "SELECT DISTINCT `post_id`,`post_name` FROM `forum` WHERE `forum_id`='". $_GET['forum_id'] ."'" ,0);
    while($result = mysql_fetch_array($query_run)){?><a href="forum.php?forum_id=<?php echo htmlspecialchars( $_GET['forum_id'] );?>&post_id=<?php echo $result['post_id'];?>"><?php echo $result['post_name'];?></a><br><?php } ?>
    <form action=<?php echo $current_file."?forum_id=". $_GET['forum_id'] ;?>	method=POST>
      <br><br><br><header><?php echo $VOCAB['newPostHeader'];?></header><br>
			 <?php echo $VOCAB['newPostName'];?><input type="text" name="post_name"></input><br>
			 <?php echo $VOCAB['message'];?><textarea rows=20 cols=100 name="message"></textarea><br>
			 <input type="submit" value=" <?php echo $VOCAB['newPostSubmit'];?> "></input><br>
    </form>
    <?php if(isset($_POST['post_name'])&& isset($_POST['message'])&&!empty($_POST['post_name'])&&!empty($_POST['message']))$query_run=zahtev( "INSERT INTO `forum` VALUES('". $_GET['forum_id'] ."','".mysql_num_rows($query_run)."','".$_POST['post_name']."','".$_POST['message']."','".$_SESSION['name']."','".$_SESSION['rank']."','".$_SESSION['id']."')" ,0);
    else if(isset($_POST['post_name'])&& isset($_POST['message'])&&empty($_POST['post_name'])&&empty($_POST['message'])) alert($VOCAB['fillInAllFields']);
  } else if( isset($_GET['forum_id']) && !isset($_GET['post_id']) && $_GET['forum_id'] <= $conf['GLOBAL']['forums']){
    $query_run=zahtev( "SELECT `id`,`message`,`sender`,`rank`,`post_name` FROM `forum` WHERE `post_id`='". $_GET['post_id'] ."' AND forum_id='". $_GET['forum_id'] ."'" ,0);
    $result = mysql_fetch_array($query_run); ?>
    <header><?php echo htmlspecialchars(mysql_result($query_run, 0, 'post_name'));?></header>
    <?php do{ ?>
      <div id="post">
        <div id="post_info">
          <header id="post_name"><?php echo htmlspecialchars($result['sender']);?></header>
          <?php echo htmlspecialchars($result['rank']);?><br>
          <img src="<?php echo $DIR['profile']."/".$id;?>" width=160 height=160 align:middle/>
        </div>
        <div id="post_message"><?php echo htmlspecialchars($result['message']);?></div>
      </div>
    <?php } while($result = mysql_fetch_array($query_run));?>
    <form action="<?php echo htmlspecialchars($current_file);?>?forum_id=<?php echo $_GET['forum_id'];?>&post_id=<?php echo $_GET['post_id'];?>" method=POST>
      <?php echo $VOCAB['answerHeader'];?> <br>
      <?php echo $VOCAB['message'];?> <textarea rows=20 cols=100 name="message"></textarea><br>
      <input type="submit" value="<?php echo $VOCAB['answerSubmit'];?>"></input>
    </form>
    <?php if(isset($_POST['message']))zahtev("INSERT INTO `forum` VALUES('". $_GET['forum_id'] ."','". $_GET['post_id'] ."','". mysql_result($query_run, 0, 'post_name') ."','".$_POST['message']."','".$_SESSION['name']."','".$_SESSION['rank']."','".$_SESSION['id']."')",0); } 
  else header("Location: /");?>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>