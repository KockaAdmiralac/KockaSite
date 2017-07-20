window.addEventListener('load',first,false);

function first(){
$("#tab_2").hide();
$("#tab_3").hide();
$("#tab_4").hide();
$("#tab_5").hide();
$("#tab_6").hide();
}

function chatInit(){
    ajax=new XMLHttpRequest();
    ajax.onreadystatechange=function(){ if(ajax.readyState==4 && ajax.status==200) document.getElementById("chat").innerHTML = ajax.responseText;};
    ajax.open("GET","/admin/realTimeChat.php",true);
    ajax.send();
    setTimeout(chatInit, 5000);
}

/*             AJAX SIGN-IN               */

function showStatus(username,password){
ajax=new XMLHttpRequest();
ajax.onreadystatechange=function(){if(ajax.readyState==4 && ajax.status==200)document.getElementById("statusDiv").innerHTML=ajax.responseText;};
ajax.open("GET","/include/hint.php?u="+username+"&p="+password,true);
ajax.send();
}

function tab_change(a){
$("#tab_1").fadeOut();
$("#tab_2").fadeOut();
$("#tab_3").fadeOut();
$("#tab_4").fadeOut();
$("#tab_5").fadeOut();
$("#tab_6").fadeOut();
current=document.getElementById("tab_"+a);
current.style.display="block";
}

/*             SLIDESHOW                  */
/*
  var imgarr = new Array();
  var a = 0;
	function slideInit(imgarray){
	  for(i=0;i<imgarray.length;i++){
		imgarr[i] = new Image();
		imgarr[i].src = imgarray[i];
	  }
	  alert("Init");
	  slide(imgarray);
	}

	function slide(imgarray){
		var slider = document.getElementById("slider");
		alert(a);
		if(a<imgarr.length){
		  slider.src = imgarray[a];
		  a = a + 1;
		}
		else{
		  a=0;
		  slider.src = imgarray[a];
		  alert(imgarray[a]);
		}
		setInterval(slide,2500);
	}
*/
/*              GOOGLE SIGN-IN            */

function signinCallback(authResult) {
  if (authResult['status']['signed_in']) {
    document.getElementById('signinButton').setAttribute('style', 'display: none');
	//window.location.href="include/foreignLogin.php?type=google";
	ajax=new XMLHttpRequest();
	ajax.onreadystatechange=function(){
		if(ajax.readyState==4 && ajax.status==200){
			alert(ajax.responseText);
		}
	};
	ajax.open("GET","https://www.googleapis.com/plus/v1/people/me?access_token="+authResult['access_token'],false);
	ajax.send();
  }
}

/*            FACEBOOK SIGN-IN            */

  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      FB.api('/me', function(response) {
	    //alert(response);
	    //window.location.href = "/include/foreignLogin.php?type=facebook&email="
      });
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : 936176473061363,
    cookie     : true,  
    xfbml      : true,
    version    : 'v2.1' 
  });
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

/*           VIDEO PLAYER         */

