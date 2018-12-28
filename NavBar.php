<?php
require_once('Config/db.php');
if(!isset($_SESSION['username'])){
	session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link  type="text/css" href="./style.css" rel="stylesheet">
		
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	.dropdown-menu{
		font-size:20px;
		color: #fffff;
		background-color: #FF7600;
		text-align:center;
	}

</style>
	<script>
		function showHide(){
			var x = document.getElementById("myNavbar");
		
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="width:100%" >
	  <div class="container-fluid">
		<div class="navbar-header">
			 <button onclick="showHide()" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
		  <span class="navbar-brand">
				<img src="./images/quiz3.png" style ="width:70px;height:51px;margin-top:-13px "/>
		  </span>
		</div>
		<div class = "collapse navbar-collapse" id="myNavbar">
		
		<ul class="nav navbar-nav navbar-right " >
		  <li><a class="fa fa-home" href="index.php"> Home</a></li>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
			<span ><i class="fa fa-graduation-cap "></i></span>
			Manager
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<!-- <li><a href="member.php">Member</a> </li>
				<li><a href="addQues.php">Questions</a> </li> -->
				<li><a href="history.php">History</a> </li>
				<li><a href="news.php">News</a> </li>
				<!-- <li><a href="feedback.php">FeedBack</a> </li> -->
			</ul>
		  </li>
		  <li><a class="fa fa-pencil-square-o" href="library.php"> Test</a></li>
		  
		  <li><a class="fa fa-phone" href="Contact.php"> Contact</a></li>

		<?php 
			if($_SESSION['username']){
				$id_member = $_SESSION['id_member']; 
				$role =mysqli_query($conn,"select role,name from member where id_member = '$id_member' ");
				$row = $role->fetch_assoc();
				//echo $_SESSION['name'];
				if($row['role'] == 'ADMIN') {
			?>
					
			<li class="dropdown">
					<a class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown" href="#">	<?php echo $row['name'] ?>
					<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a class="fa fa-user-circle-o" href="Profile.php?id_member= <?= $_SESSION['id_member'] ?> "> ProFile</a></li>
					<li><a class="fa fa-tachometer " href="admin.php"> Admin Page</a></li>
					<li><a class="fa fa-sign-out " href="logout.php"> LogOut</a></li>
				</ul>
		  </li>
				<?php
			}else {
				?>
				<li class="dropdown">
					<a class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown" href="#">	<?php echo $row['name']  ?>
					<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a class="fa fa-user-circle-o" href="Profile.php?id_member= <?= $_SESSION['id_member'] ?> "> ProFile</a></li>
					<li ><a class="fa fa-sign-out "  href="logout.php"> LogOut</a></li>
				</ul>
		  </li>
				<?php
			}
		}
		?>	
		</ul>
	  </div>
		</div>
	</nav>

</body>
</html>