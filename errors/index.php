<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
	<section id="main_section">
		<header>Poruka</header>
		<p><?php
		$id=$_GET['id'];
		switch($id){
		case 1:
		$name="MySQL: can't connect";
		$desc="Sajt se ne može povezati sa serverom baza podataka.";
		$return="index.php";
		break;
		 case 2:
		$name="MySQL: can't connect to database";
		$desc="Sajt se ne može povezati sa bazom podataka";
		$return="index.php";
		break;
		 case 3:
		$name="FATAL ERROR: Can't start session";
		$desc="Ne može se pokrenuti sesija. Ovo je jedna od retkih greški!";
		$return="index.php";
		break;
		 case 4:
		$name="FATAL ERROR: Can't start ob";
		$desc="Ne može se pozvati funkcija ob_start(). Ovo je jedna od retkih greški.";
		$return="index.php";
		break;
		 case 5:
		$name="MySQL: can't run query";
		$desc="Server za bazu podataka ne može da obradi zahtev";
		$return="register.php";
		break;
		 case 6:
		$name="Postfix: Mail error";
		$desc="Mail ne može biti poslat";
		$return="register.php";
		break;
		 case 7:
		$name="register.php: Session restarted";
		$desc="Linku koji Vam je poslat na mail morate pristupiti sa istog uređaja sa kog ste ga poslali, bez restartovanja pretraživača. ";
		$return="register.php";
		break;
		 case 8:
		$name="MySQL: can't run query";
    $desc="Server za bazu podataka ne može da obradi zahtev. Pošto je ovo glavna strana, molimo sačekajte dok ne otklonimo kvar.";
		$return="errors/404.php";
		break;
		 case 9:
		$name="index.php: IP BANNED OR UNAVAILABLE";
		$desc="Vaša IP adresa je banovana sa sajta ili je nedostupna. Ukoliko mislite da je ovo greška, javite nam se.";
		$return="errors/404.php";
		break;
		 case 10:
		$name="MySQL: can't run query";
		$desc="Server za bazu podataka ne može da obradi zahtev";
		$return="login.php";
		break;
		 case 11:
		$name="kontakt.php: Mail sent";
		$desc="Mail je uspešno poslat. Hvala!";
		$return="index.php";
		break;
		 case 12:
		$name="Postfix: Mail error";
		$desc="Mail ne može biti poslat";
		$return="kontakt.php";
		break;
		 case 13:
		$name="logout.php: Logout successful";
		$desc="Uspešno ste se odjavili!";
		$return="index.php";
		break;
		 case 14:
		$name="MySQL: can't run query";
		$desc="Server za bazu podataka ne može da obradi zahtev.";
		$return="minecraft.php";
		break;
		 case 15:
		$name="Postfix: Mail error";
		$desc="Mail ne može biti poslat!";
		$return="minecraft.php";
		break;
		 case 16:
		$name="minecraft.php: Mail sent";
		$desc="Mail je poslat administratoru. On će uskoro pogledati Vaš zahtev";
		$return="minecraft.php";
		break;
		
		 case 17:
		$name="MySQL: can't run query";
		$desc="Server za bazu podataka ne može da obradi zahtev.";
		$return="index.php";
		break;
		 case 20:
		$name="register.php: Passwords not matching";
		$desc="Lozinke se ne slažu!";
		$return="register.php";
		break;
		 case 19:
		$name="register.php: Invalid captcha";
		$desc="Nije tačan tekst sa slike!";
		$return="register.php";
		break;
		 case 18:
		$name="login.php: User exists";
		$desc="Već postoji korisnik sa tom adresom e-pošte!";
		$return="register.php";
		break;
		 case 21:
		$name="verify.php: Registration successful!";
		$desc="Registracija uspešna!";
		$return="login.php";
		break;
		 case 22:
		$name="verify.php: Mail sent";
		$desc="Na mail Vam je poslat verifikacioni link.";
		$return="index.php";
		break;
		 case 23:
		$name="MySQL: can't run query";
		$desc="Server baze podataka ne može da obradi zahtev.";
		$return="chat.php";
		break;
		
 		default:
		header('Location: ../index.php');
		break;
		}	
		$return="/".$return;
		 echo "Kôd poruke: ".$id;
		 echo "<br>Ime poruke: ".$name;
		 echo "<br>Opis: <br>".$desc;?>
<br><a href=<?php echo $return; ?>>Kliknite ovde da se vratite nazad</a>
		</p>
	</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>