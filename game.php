<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cat Bird</title>
    <link href="./style_game.css" rel="stylesheet" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php require_once('NavBar.php');?>
<br/><br/><br/><br/>

    <div id="container">

        <div id="bird"></div>

        <div id="pole_1" class="pole"></div>
        <div id="pole_2" class="pole"></div>

    </div>

    <div id="score_div">
        <p><b>Score: </b><span id="score">0</span></p>
        <p><b>Speed: </b><span id="speed">10</span></p>
    </div>

    <button id="restart_btn">Restart</button>

    <?php 
        if(isset($_SESSION['id_member'])){
            $id_member = $_SESSION['id_member'];
            $name =mysqli_query($conn,"select name from member where id_member = '$id_member' ");
            $row = $name->fetch_assoc();
        }
    ?>
	<div class = "container">
		 <h1 style="text-align:center" > <?= $row['name'] ?> <span class="typed"></span></h1>
	</div>
   
    <script src="./js/game.js"></script>
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
			<br/><br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center;" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>

</html>
