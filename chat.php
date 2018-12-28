<?php
//session_start();
require_once('Config/db.php');
?>
<!doctype html>
<html>
<head>
<title>Chat1 Box</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">

			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

function submitChat() {
//if(form1.uname.value == '' || form1.msg.value == '') {
	if( form1.msg.value == '') {
		//alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var msg = form1.msg.value;
	
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	//msg_id_member
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	
	xmlhttp.send(null);
	form1.msg.value = '';
}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	$( "#msg_area" ).keyup(function(e) {
		  var code = e.keyCode || e.which;
		
		 if(code == 13) { 
		   submitChat();		 
		 }
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});


$(document).ready(function() {

	$('#live-chat header').on('click', function() {

		$('.chat').slideToggle(350, 'swing');
		$('.chat-message-counter').fadeToggle(350, 'swing');
	});

	$('.chat-close').on('click', function(e) {
		e.preventDefault();
		$('#live-chat').fadeOut(300);

	});

});
</script>

<style>
a { text-decoration: none; }

fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}

h4, h5 {
	line-height: 1.5em;
	margin: 0;
}

hr {
	background: #e9e9e9;
    border: 0;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 1.5px;
    margin: 0;
    min-height: 1px;
}

.clearfix img {
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}

input {
	border: 0;
	color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}

p { margin: 0; }

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}
.clearfix:after { clear: both; }

/* ---------- LIVE-CHAT ---------- */

#live-chat {
	z-index:0;
	bottom: 0;
	font-size: 12px;
	left: 20px;
	position: fixed;
	width: 300px;
	border : 1px solid gray;
	border-radius: 6px;
}

#live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 10px 20px;
}

#live-chat h4:before {
	background: #1a8a34;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}

#live-chat h4 {
	font-size: 12px;
}

#live-chat h5 {
	font-size: 10px;
}

#live-chat form {
	padding: 25px;
	font-size: 10px;
	margin-left: 4px;
	margin-bottom:0px;
}

#live-chat textarea[type="text"] {
	border: 1.5px solid #ccc;
	border-radius: 3px;
	padding: 8px;
	outline: none;
	width: 234px;
}

.chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

.chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
}

.chat {
	background: #fff;
}

.chat-history {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}

.chat-message {
	margin: 16px 0;
}

.chat-message img {
	border-radius: 50%;
	float: left;
}

.chat-message-content {
	margin-left: 56px;
}

.chat-time {
	float: right;
	font-size: 10px;
}


</style>

</head>
<body>

<div id="live-chat">
		<header class="clearfix">
			<a href="#" class="chat-close">x</a>
			<h4>Admin</h4>
			<span class="chat-message-counter">3</span>
		</header>
		<div class="chat">
		<div  class="chat-history">
			<div id="chatlogs"></div>
		</div>
			<form name="form1" onsubmit = "submitChat()" >
				<fieldset>	
					<textarea  id="msg_area" name="msg" type="text" placeholder="Type your message…" autofocus></textarea>
					<input  id="msg_id_member" name="msg_id_member" type="hidden" value = "<?= $_SESSION['id_member'] ?>">
				</fieldset>
			</form>
		</div> 
</div> 
	
</body>