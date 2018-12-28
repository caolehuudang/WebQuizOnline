<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>    
	<link  type="text/css" href="style.css" rel="stylesheet">
	<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	.dropdown-menu{
		font-size:20px;
		color: #fffff;
		background-color: #FF7600;
		text-align:center;
	}

</style>
<body>
 <?php require_once('NavBar.php');?>
	
	<br/>	<br/>	

    <div class= "constant">
        <img src="images/quiz.png" width="100% " heigth="60%">
    </div>
	
	<div class="container-fluid">
		<section style="text-align: center; ">
			<p style="font-size: 50px"> WELCOME TO QUIZ ONLINE</p>
			<p style="font-size: 30px">You can do your test by click TEST on the Menu and choose your course!</p>
		</section>
	</div>
   <hr/>
   

        <div  >
            <div class="LeftBF">
                <h3>QUIZ ONLINE </h3>
                <p style="margin: 5px 5px 5px 0"><i class="fa fa-home"> </i> 19 Nguyen Huu Tho street, Tan Phong ward, District 7, Ho Chi Minh City, Vietnam.</p>


                <p style="margin: 5px 5px 5px 0">Connect with QUIZ ONLINE:</p>

                <a  href ="https://www.facebook.com/tdt.edu.vn"><img src="images/Facebook.png" width="25px" ></a>

                <a href ="https://www.youtube.com/user/DhTonDucThang"><img  src="images/Youtube.png" width="25px"></a>

                <a><img  src="images/Google-plus.png" width="25px"></a>

                <a><img   src="images/Twitter.png" width="25px"></a>



            </div>

        </div>

	<hr/>

    <p id="back-top"><a href="#" title="Back to top" class="scrollup" ><span></span></a></p>

	<?php
	if($_SESSION['id_member'] != 1){
		require_once('chat.php');
	} 
	else{}
	 ?>

 	<?php 
		require_once('footer.php');
	?>

	<script>
	$(document).ready(function(){
		
		$("#back-top").hide();
	 
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
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
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>

</body>
</html>