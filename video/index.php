<?php require $_SERVER['DOCUMENT_ROOT'].'/include/header.inc.php';
if(!file_exists( $_GET['video'].".mp4" ) || !isset($_GET['video'])) header('Location: ../index.php');?>
<script src="../include/video.js"></script>
	<section id="videoplayer">
		<header> <?php echo $VOCAB['header'];?> </header>
			<video id="video" preload="auto" height=320 width=640 type="video/mp4" async defer>
				<source src="<?php echo $_GET['video'].".mp4" ?>"/>
			</video>
		<div id="video_controls">
			<div id="buttons">
				<button type="button" id="play">Play</button>
			</div>
			<div id="defaultBar">
				<div id="progressBar"></div>
			</div>
			<div style="clear:both"></div>
		</div>
	</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/include/footer.inc.php';?>