<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
checkAdmin();
if (isset( $_FILES['file']['name'] ) && !empty( $_FILES['file']['name'] ))alert(move_uploaded_file( $_FILES['file']['tmp_name'] , $_SESSION['id'] ."/". $_FILES['file']['name'] ) ? "Uploadovano!" : "Došlo je do greške!"); ?>
	<section id="main_section">
    <header>Upload fajlova</header>
    <p>
        Admini, uploadujte šta hoćete, ali ne previše!<br />
    </p>
    <form action="<?php echo htmlspecialchars($current_file);?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file"></input>
        <input type="submit" value="Upload"></input>
    </form>
    <p>
        U vašem direktorijumu su:
    </p>
    <?php
        opendir($_SESSION['id']);
        $listing = readdir();
        while($listing != ""){
            echo ($listing==".")||($listing=="..") ? "" : "<p><a href='".$_SESSION['id']."/".$listing."'>".$listing."</a></p>";
            $listing = readdir();
        }
    ?>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>