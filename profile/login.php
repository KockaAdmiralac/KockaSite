<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';?>
  <section id="main_section">
    <header><?php echo $VOCAB['login'];?></header>
    <p><?php echo $VOCAB['desc'];?></p><br>
    <?php echo $VOCAB['email'];?><br/><input type="text" name="email" value="<?php echo @$_POST['email'];?>" id="userName"></input><br>
    <?php echo $VOCAB['password'];?><br/><input type="password" name="password" onblur="showStatus(document.getElementById('userName').value,this.value);"></input><br />
    <form action="<?php echo htmlspecialchars($current_file);?>" method="POST"><div id="statusDiv"></div></form>
    <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="true" data-auto-logout-link="true"></div>
    <span id="signinButton"><span class="g-signin" data-callback="signinCallback" data-clientid="1092193716655-u3mp4c732p0cg4gpqun7q7cll03k56k7" data-cookiepolicy="single_host_origin" data-scope="profile"></span></span>
	</section>
<?php if(isset($_SESSION['name'])&&!empty($_SESSION['name'])) (!isset($_SESSION['redir'])||empty($_SESSION['redir'])) ? header("Location: /index.php?profile") : header("Location: ".stripslashes($_SESSION['redir']));
require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>