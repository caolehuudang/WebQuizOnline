<?php
session_start();
require_once('Config/db.php');
?>
<?php
if (isset($_SESSION['username']) == false) {
    header('Location: login.php');
}else {
   

    $username=$_SESSION['username'];
    $sql = mysqli_query($conn,"select *from $tb_name WHERE  username = '$username'");
    $row = mysqli_fetch_array($sql);
    if ($row['role'] == 'USER' || $row['role'] == 'EMPLOYEE') {
        $_SESSION['role'] = $row['role'];
       ?>
        <script>
            window.location="home.php"
        </script>
        <?php
    } 
    else {
?>

<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}

.chat_img1{
  margin-left: 1%;
  margin-bottom:5px;
  position : fixed; 
  width: 3.5%;
}

.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 10px;
  color: #646464;
  font-size: 16px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 75%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}

#show_list_chat{
    -moz-user-select: none;


   -khtml-user-select: none;


   -webkit-user-select: none;


   -ms-user-select: none;


   user-select: none;
}

</style>

</head>
<script>
$(document).ready(function() {

$('#show_list_chat ').on('dblclick', function() {
    $('.messaging').slideToggle(500, 'swing');
    //$('.inbox_msg').fadeToggle(350, 'swing');
});

$('.chat-close').on('click', function(e) {
    e.preventDefault();
    $('#live-chat').fadeOut(300);

});
});

$(document).ready(function() {
    $( function() {
    $( "#show_list_chat" ).draggable();
  } );
});


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
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 1000 );
    setInterval( function(){ $('#chatlogs1').load('logs1.php'); }, 10 );
});


function submitChat() {
  
//if(form1.uname.value == '' || form1.msg.value == '') {
	if( form1.msg.value == '') {
		return;
	}
	var msg = form1.msg.value;
	console.log(msg);
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			document.getElementById('chatlogs1').innerHTML = xmlhttp.responseText;
		}
	}
	//msg_id_member
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	xmlhttp.send(null);
	form1.msg.value = '';
}
</script>
<body>

<div class="row content">
<br/><br/><br/>
<?php require_once('sideNav.php');?>

<div class = "col-sm-1"> 
    <div id = "show_list_chat" class="chat_img1"> 
      <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
    </div>
</div>
<div class ="col-sm-7">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>List User</h4>
            </div>           
          </div>
          <div class="inbox_chat">
           <div id="chatlogs"></div>
        </div>
</div>

        <div class="mesgs">
          <div class="msg_history">
          <div id="chatlogs1"></div>
        </div>

          <div class="type_msg">
            <div class="input_msg_write">
            <form name="form1" onsubmit = "submitChat()" >
              <input id="msg_area" name="msg" type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
           
        
    </div>
</div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 </body>
</html>

<?php 
    }
  }
?>