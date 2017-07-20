<?php require $_SERVER['DOCUMENT_ROOT']."/include/header.inc.php";
checkAdmin(); ?>
<script>chatInit();</script>
<section id="main_section">
    <header>Admin chat</header>
    <p>
        Admini, ovde pričajte šta hoćete!
    </p>
    <div id = "chat"></div>
<form action = "realTimeChat.php" method = "GET">
    <input type = "text" name = "message"></input>
</form>
</section>

<?php require $_SERVER['DOCUMENT_ROOT']."/include/footer.inc.php"?>