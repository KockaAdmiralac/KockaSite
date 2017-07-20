<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
if(isset($_SESSION['email']) && !empty($_SESSION['email']))header('Location: /profile?profile');
if(isset($_GET['code'])){
  $result = mysql_fetch_array(zahtev("SELECT * FROM `temp_users` WHERE id = ".$_GET['code'], 12)); 
  (!empty($result)) ? zahtev( "INSERT INTO `users` VALUES('','".$result['email']."','".$result['password']."','0.0.0.0','".$result['name']."','".$result['surname']."','".$result['description']."','".$result['phone']."','Registrovan')",7): alert($VOCAB['wrongCode']);
  zahtev("DELETE FROM `temp_users` WHERE `id` = ".$_GET['code']);} ?>
  <section id="main_section">
    <header><?php echo $VOCAB['header'];?></header>
    <p><?php echo $VOCAB['p'];?></p>
    <img src="/media/kocka.jpg" id="logo2" async defer/>
    <form action=<?php echo htmlspecialchars($current_file);?> method="POST">
      <?php echo $VOCAB['email'];?><input type="text" name="email" size=50></input><br>
      <?php echo $VOCAB['password'];?><br>
      <input type="password" name="password" size=50></input><br>
      <input type="password" name="repeatpassword" size=50></input><br>
      <?php echo $VOCAB['name'];?> <input type="text" name="name" size=50></input><br>
      <?php echo $VOCAB['surname'];?><input type="text" name="surname" size=50></input><br>
      <?php echo $VOCAB['phone'].$VOCAB['not-required'];?> <input type="text" name="phone" size=50></input><br>
      <?php echo $VOCAB['description'].$VOCAB['not-required'];?> <br><textarea rows=10 cols=50 name="description"></textarea><br><br />
      <img src="/include/generate.inc.php"/><br />
      <?php echo $VOCAB['numberpic'];?> <input type="text" name="secure"></input>
      <input type="submit" value="Register"></input><br />
    </form>
    <?php function setting(){
      $rand = rand(1000,9999);
      $phone = (isset($_POST['phone'])&&!empty($_POST['phone'])) ? $_POST['phone']:0 ;
      $description = (isset($_POST['description'])&&!empty($_POST['description'])) ? $_POST['description']:"" ;
      alert( mail( $_POST['email'] , 'Verifikacija' , "Ovde je verifikacioni kod http://kocka.dilfa.com/register.php?code=".$rand .". Ako ste greškom dobili ovu poruku, izbrišite je." , "From: accounts@kocka.dilfa.com" ) ? "Na mail Vam je poslat verifikacioni link!" : "Mail ne može biti poslat!" ); 
      zahtev("INSERT INTO `temp_users` VALUES('".$rand."', '".$_POST['email']."',  '".md5($_POST['password'])."', '0.0.0.0', '". $_POST['name'] ."',  '". $_POST['surname'] ."',  '". $description ."',  '".$phone."', 'Registrovan' )" , 13);}
    (isset($_SESSION['email'])||!empty($_SESSION['email'])) ? header('Location: profile.php') : (isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['repeatpassword'])&&isset($_POST['name'])&&isset($_POST['surname'])&& !empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['repeatpassword'])&&!empty($_POST['name'])&&!empty($_POST['surname'])) ? $_POST['password'] == $_POST['repeatpassword']  ? $_SESSION['secure']==$_POST['secure'] ? mysql_num_rows( zahtev( "SELECT `email` FROM `users` WHERE `email`='".mysql_real_escape_string( $_POST['email'] )."'" ,5) ) !=0 ? alert("Već postoji korisnik s istom adresom e-pošte") : setting() : alert("Nije tačan tekst sa slike!"): alert("Lozinke se ne slažu!") :  (isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['repeatpassword'])&&isset($_POST['name'])&&isset($_POST['surname'])&& empty($_POST['email'])&&empty( $_POST['password'])&&empty($_POST['repeatpassword'])&&empty($_POST['name'])&&empty($_POST['surname']) ) ? alert("Popunite sva potrebna polja!") : $a=0 ; ?>
	</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>