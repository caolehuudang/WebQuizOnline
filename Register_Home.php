

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link  type="text/css" href="style.css" rel="stylesheet">
   <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body >
<nav class="navbar navbar-inverse navbar-fixed-top" style="width:100%" >
	  <div class="container-fluid">
		<div class="navbar-header">
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
		  <span class="navbar-brand">
				<img src="./images/quiz3.png" style ="width:70px;height:51px;margin-top:-13px "/>
		  </span>
		</div>
		<ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
		  <li><a class="fa fa-home" href="Register_Home.php"> Home</a></li>
          <li><a class="fa fa-registered" href="Register.php"> Register</a></li>
		  <li><a class="fa fa-paw" href="Register_about.php"> About</a></li>
		  <li><a class="fa fa-sign-in" href="login.php"> Login</a></li>
</nav>
<br/>
<div class= "constant">
        <img src="images/quiz.png" width="100% " heigth="60%">
    </div>
	
	<div class="container-fluid">
		<section style="text-align: center; ">
			<p style="font-size: 50px"> WELCOME TO QUIZ ONLINE</p>
			<p style="font-size: 30px">HÃY ĐĂNG KÝ THÀNH VIÊN ĐỂ CÓ THỂ LÀM NHỮNG BÀI TEST CÂN NÃO Ở QUIZ ONLINE</p>
		</section>
	</div>
   <hr/>
	
   <div class = "container">

   </div>
            <div class="LeftBF">
                <h3>QUIZ ONLINE </h3>
                <p style="margin: 5px 5px 5px 0"><i class="fa fa-home"> </i> 19 Nguyen Huu Tho street, Tan Phong ward, District 7, Ho Chi Minh City, Vietnam.</p>


                <p style="margin: 5px 5px 5px 0">Connect with QUIZ ONLINE:</p>

                <a  href ="https://www.facebook.com/tdt.edu.vn"><img src="images/Facebook.png" width="25px" ></a>

                <a href ="https://www.youtube.com/user/DhTonDucThang"><img  src="images/Youtube.png" width="25px"></a>

                <a><img  src="images/Google-plus.png" width="25px"></a>

                <a><img   src="images/Twitter.png" width="25px"></a>
            </div>

	<p id="back-top"><a href="#" title="Back to top" class="scrollup" ><span></span></a></p>
	
	<script>
		$(document).ready(function(){
		
		$("#back-top").hide();
	 
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 80) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
	 
			$('#back-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 900);
				return false;
			});
		});
	 
	});
	</script>
</body>
</html>
