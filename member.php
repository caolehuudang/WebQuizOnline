<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    $username = $_SESSION['username'];
    $sql = mysqli_query($conn, "select *from $tb_name WHERE  username = '$username'");
    $row = mysqli_fetch_array($sql);
    if ($row['role'] == 'EMPLOYEE' || $row['role'] == 'USER' ) {
        $_SESSION['role'] = $row['role'];
        ?>
        <script>
            window.alert("You do not have role to access this page");
            window.location = "home.php"
        </script>
        <?php
    } else {
        $sql2=mysqli_query($conn,"select *from $tb_name")
	
        ?>




<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>LIST MEMBERS</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			 <link  type="text/css" href="style2.css" rel="stylesheet">
			 <link  type="text/css" href="style.css" rel="stylesheet">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
        </head>
        <body>

       
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
		  <li><a class="fa fa-home" href="home.php"> Home</a></li>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
			<span ><i class="fa fa-graduation-cap "></i></span>
			Manager
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="member.php">Member</a> </li>
				<li><a href="addQues.php">Questions</a> </li>
				<li><a href="history.php">History</a> </li>
				<li><a href="news.php">News</a></li>
				<li><a href="feedback.php">FeedBack</a> </li>
			</ul>
		  </li>
		  <li><a class="fa fa-newspaper-o" href="library.php"> News</a></li>
		  <li class="dropdown">
			<a class="dropdown-toggle fa fa-pencil-square-o" data-toggle="dropdown" href="#"> Test
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="index.php">Math</a></li>
				<li><a href="index2.php" >Physical</a></li>
				<li><a href="index3.php">Chemistry</a></li>
			</ul>
		  </li>
		  <li><a class="fa fa-phone" href="Contact.php"> Contact</a></li>
		  <li><a class="fa fa-sign-out " href="logout.php"> Logout</a></li>
		</ul>
	  </div>
	</nav>
	

        <section>
        <div class="container"  >
        <table style="color: white; font-size: 15px;text-align:center" class="table table-bordered">
            <tr ><p style="font-size: 20px; color: yellow;margin-top:10px">LIST MEMBERS</p></tr>
            <thead style="text-align:center">
            <tr>
                <th><p style="margin: 5px 5px 5px 5px">ID</p></th>
                <th><p style="margin: 5px 5px 5px 5px">Username</p></th>
                <th><p style="margin: 5px 5px 5px 5px">Password</p></th>
                <th><p style="margin: 5px 5px 5px 5px">Role</p></th>
                <!-- <th><p style="margin: 5px 5px 5px 5px">Subject</p></th> -->
                <th><p style="margin: 5px 5px 5px 5px">Update</p></th>
                <th><p style="margin: 5px 5px 5px 5px; text-align: center">Delete</p></th>
            </tr>
            </thead>

            <tbody>
            <?php
            while ($result = mysqli_fetch_array($sql2)) {
                ?>

                <tr >
                    <td><?= $result['id_member'] ?></td>
                    <td><?= $result['username'] ?></td>
                    <td><?= $result['password'] ?></td>
                    <td><?= $result['role'] ?></td>
                    <!-- <td><?=$result['subject']?></td> -->
                    <td><a href="subject.php?id_member=<?=$result['id_member']?>" class="btn btn-warning">Update</td>
                    <td><a onclick="return confirm('Are you sure want to delete this user?')" href="delete.php?id_member=<?=$result['id_member']?>" class="btn btn-danger">Delete</td>
                </tr>

                <?php

            }
            ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" style="margin: 30px 0 70px 0px"><a style="text-decoration: none; color: white; text-transform: uppercase;" href="add-member.php" >Add Member</a></button>
        <script>
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
		</body>
        </html>


        <?php
    }
}
?>