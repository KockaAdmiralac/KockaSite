<?php require $_SERVER['DOCUMENT_ROOT']."/include/header.inc.php";
if(isset($_POST['password']) && $_POST['password'] == "toleJeGei") alert(mail(@$_POST['to'],@$_POST['subject'],@$_POST['body'],"From: ".@$_POST['headers']) ? "Mail poslat!":"Greška!");?>
<section id = "main_section">
  <form action="mail.php" method="POST">
    Lozinka : <input type="password" name="password"></input><br>
	  Za : <input type="text" name="to"></input><br>
	  Naslov : <input type="text" name="subject"></input><br>
	  Poruka : <input type="text" name="body"></input><br>
	  Od : <input type="text" name="headers"></input><br>
	  <input type="submit" value="MUAHAHAHAHAHA!">
  </form>
</section>
<?php require $_SERVER['DOCUMENT_ROOT']."/include/footer.inc.php";?>