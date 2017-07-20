<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
checkLogin();?>
	<section id="main_section">
		<header><?php echo $VOCAB['header'];?></header>
		<p> <?php echo $VOCAB['desc'];?><br/>
     <ul>
		    <?php if(!isset($_GET['product_id'])){
		      $query_run=zahtev( "SELECT * FROM `store` WHERE 1" ,0);
		      while($result = mysql_fetch_array($query_run)){?><li><a href="index.php?product_id=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li><?php } ?>
		  </ul>
		</p>
		<?php if($_SESSION['rank']=="Admin"){ ?>
	    <form action="<?php echo $current_file;?>" method=POST>
	      <input name="product_name" type="text"></input>
	      <textarea name="product_review" rows=10></textarea>
	      <input name="product_price" type="text"></input>
	      <input value="Ubaci u prodaju!" type="submit"></input>
	    </form>
	  <?php if(isset($_POST['product_name'])) zahtev( "INSERT INTO store VALUES('','".$_POST['product_name']."','".$_POST['product_review']."','".$_POST['product_price']."')" ,0);} }
		else{
		  $result = mysql_fetch_array(zahtev( "SELECT * FROM store WHERE `id`='".$_GET["product_id"]."'" ,0));?>
		  <div class="tabs">
		    <ul>
		      <li><a href="#one" onclick=tab_change(1)>Proizvod</a></li>
  	      <li><a href="#two" onclick=tab_change(2)>Komentari</a></li>
		      <li><a href="#three" onclick=tab_change(3)>Slike</a></li>
       </ul>
       <div id="tab_1">
		      <header><?php echo $result["name"];?></header>
		      <p><?php echo $result["review"];?><br>
		      <?php echo $VOCAB['price']." : ".$result["price"];?> dinara</p>
       </div>
       <div id="tab_2">
         <header> <?php echo $VOCAB['comments'];?> </header>
         <p><?php $query_run=zahtev( "SELECT * FROM store_comments WHERE product_id='". $_GET['product_id'] ."'" ,0);
           while($result = mysql_fetch_array($query_run)){
           $result2=mysql_fetch_array(zahtev("SELECT name, surname FROM users WHERE id='".$result["user_id"]."'",0));?>
           <a href="/profile.php?id=<?php echo $result['user_id'];?>"><?php echo $result2['name']." ".$result2["surname"];?></a><?php echo $result["comment"];?><br>
           <?php } ?>
         <form action="<?php echo $current_file."?product_id=". $_GET['product_id'] ;?>" method=POST>
			      <?php echo $VOCAB['yourComment'];?> <input type="text" name="comment"></input>
			      <input type="submit" value="<?php echo $VOCAB['send'];?>"></input>
         </form>
         <?php if(isset($_POST['comment'])&&!empty($_POST['comment'])) zahtev("INSERT INTO store_comments VALUES('". $_GET['product_id'] ."','".$_SESSION['id']."','". $_POST['comment'] ."')",0);?>
         </p>
       </div>
       <div id="tab_3">
         <header> <?php echo $VOCAB['images'];?> </header>
		      <p></p>
       </div>
      </div>
    <?php } ?>
  </section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>