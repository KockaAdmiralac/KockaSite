function first(){
barSize=500;
video=document.getElementById('video');
play=document.getElementById('play');
defaultBar=document.getElementById('defaultBar');
progressBar=document.getElementById('progressBar');

defaultBar.addEventListener('click',clickedbar,false);
play.addEventListener('click',PlayPause,false);
}
function PlayPause(){
	if(!video.paused&&!video.ended){
		video.pause();
		play.innerHTML='Play';
		window.clearInterval(updateBar);
	}
	else if(video.readyState==4){
		video.play();
		play.innerHTML='Pause';
		updateBar=setInterval(update,1);
	}
	else{
		alert("Video not ready!");
		}
}
function clickedbar(e){
	var mouseX=e.pageX - defaultBar.offsetLeft;
	var newtime=mouseX*video.duration/barSize;
	video.currentTime=newtime;
	progressBar.style.width=mouseX+'px';
}

function update(){
	if(!video.ended){
		var size=parseInt(video.currentTime*barSize/video.duration);
		progressBar.style.width=size+'px';	
	}
	else{
		play.innerHTML="Play";
		progressBar.style.width='0px';
		window.clearInterval(updateBar);
	}
}
window.addEventListener('load',first,false);