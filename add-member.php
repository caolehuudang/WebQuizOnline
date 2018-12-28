<?php
session_start();
require_once('Config/db.php');?>
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
            window.alert("You do not have role to access this page");
            window.location="home.php"
        </script>
        <?php
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Add Member</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="./style.css" rel="stylesheet">
			<link  type="text/css" href="styleLogin.css" rel="stylesheet">
			<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
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
<script>
function showError() {
        $("#fail-message-alert").fadeIn(1500);
        setTimeout(function () {
            $("#fail-message-alert").fadeOut(1000);
        },3000);
    }
    function checkInput() {
			if ($("#username").val() == ''){
				$("#fail-message").html("Vui lòng nhập username");
				showError();
				$("#username").focus();
				return false;
			}

			if ($("#password").val() == ''){
				$("#fail-message").html("Vui lòng nhập password");
				showError();
				$("#password").focus();
				return false;
			}
      if ($("#name").val() == ''){
				$("#fail-message").html("Vui lòng nhập Full name");
				showError();
				$("#name").focus();
				return false;
			}

			if ($("#role").val() == ''){
				$("#fail-message").html("Vui lòng nhập Role");
				showError();
				$("#role").focus();
				return false;
			}
		

			return true;
		}
</script>
   <?php require_once('NavBar.php');?>
     <div id="fail-message-alert" class="alert alert-danger" style="max-width: 500px; margin: auto; text-align: center; display: none">
        <span id="fail-message"></span>
    </div>

    <div class="container" style = "width:40%;height:auto">
            <img src="images/addMem.png">
			<form onsubmit="return checkInput()" class="form-horizontal" action="add-member.php" method="post" style="color:yellow"> 
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Username:</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"/>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Password:</label>
				  <div class="col-sm-8">
					<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password"/>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-8">
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email"/>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="name">Full Name:</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"/>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="role">Permission:</label>
				  <div class="col-sm-8">
					<select  class="form-control"  name="role" id="role">
					  <option value="ADMIN">Admin</option>
					  <option value="USER">User</option>
					  <option value="EMPLOYEE">Employee</option>
					</select>
				  </div>
				</div>
			   
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="btn_submit" value="Add Member" class="btn btn-success">
				  </div>
				</div>
			</form>
	</div>
        </div>
       
        <?php
        if (isset($_POST["btn_submit"])) {
         
						//$id = $_POST['id'];
						$name = $_POST['name'];
            $username = $_POST['username'];
						$password = $_POST['password'];
						$email = $_POST['email'];
			      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $sql2= mysqli_query($conn,"select * from $tb_name WHERE username = '$username'");
            //$sql3=mysqli_query($conn,"select * from $tb_name WHERE id = $id");
            $username_exist=mysqli_num_rows($sql2);
            //$id_exist = mysqli_num_rows($sql3);
             if($username_exist)
             {
                ?>
                <script>
                window.alert("Username đã tồn tại");
                window.location="add-member.php"
                </script>
                <?php
             }
             /*elseif($id_exist)
             {
                ?>
                <script>
                window.alert("ID is not available");
                window.location="add-member.php"
                </script>
                <?php
             }*/
             else{

                $sql = "INSERT INTO member(username, password, role,name,email) VALUES ('$username','$hashed_password','$role','$name','$email')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                window.alert("Success");
                window.location="list_member.php";
                </script>
             <?php

            }
        }
        }

        ?>
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
?>