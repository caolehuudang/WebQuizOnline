<?php
session_start();
require_once('Config/db.php');
if(isset($_SESSION['username']))
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link  type="text/css" href="./styleLogin.css" rel="stylesheet">
	<link href="./animations.css" rel="stylesheet">
	<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	
</head>
<body>
<h2 style="text-align:center;color:rgba(240, 127, 80, 1)">Welcome To Quiz Online</h2>
<div class="container animatedParent animateOnce">
    <img src="images/logo.png" style="width:150px;height:auto;margin-top:-80px" class=" animated bounceInDown">
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <form name="form1" method="post" >
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

                        <tr>
                            <td><input class="form-control animated bounceInDown" name="username" placeholder="Enter Username" type="text" id="username"style="height: 45px;  margin-bottom:20px;padding-left:10px;"></td>
                        </tr>
                        <tr>
                            <td><input  class="form-control animated bounceInDown" name="password" placeholder="Enter Password" type="password" id="password" style=" height: 45px;  margin-bottom:20px;padding-left:10px;"></td>
                        </tr>
                        <tr>
                            <td><input style="margin-bottom:20px" type="submit" name="Submit" value="Login" class="btn btn-success animated bounceInDown slowest"></td>
						</tr>
							<a style="margin-bottom:20px" href= "./Register_Home.php" class="btn btn-info animated bounceInRight slowest">Đăng ký</a>
                    </table>
				</td>
            </form>
		</tr>
	</table>
	
</div>
<?php
if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
	
		//$username = strip_tags($username);
		//$username = addslashes($username);
		//$password = strip_tags($password);
		//$password = addslashes($password);
		$username = strip_tags(mysqli_real_escape_string($conn, trim($username)));
		$password = strip_tags(mysqli_real_escape_string($conn, trim($password)));
		//query
		$sql = "select *from $tb_name WHERE username  = '$username' ";
		$query = mysqli_query($conn, $sql);
		//$count = mysqli_num_rows($query);
		//$row = mysqli_fetch_array($query);
		//$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		if(mysqli_num_rows($query) > 0)  {
			$row = mysqli_fetch_array($query);
			echo $row['password'];
			$hashed_password = $row['password'];
			if(password_verify($password,$hashed_password)){
				$_SESSION['username'] = $username;
				$_SESSION['id_member']=$row['id_member'];
				header('Location:admin.php');
				echo $_SESSION['username'];
			}
			else{
				echo "<div align='center' style='color: #555;border-radius: 10px;font-family: Tahoma, Geneva, Arial;font-size: 11px;padding: 10px 10px 10px 36px;margin: 20px 300px 0 300px;;background: pink;border: 1px solid #f2c779;'>
				<span style='font-weight: bold;text-transform: uppercase;'>Error: </span>
					Your Username or Password is wrong. Please try again !</div>";
			}
		}
		else{
			echo "<div align='center' style='color: #555;border-radius: 10px;font-family: Tahoma, Geneva, Arial;font-size: 11px;padding: 10px 10px 10px 36px;margin: 20px 300px 0 300px;;background: pink;border: 1px solid #f2c779;'>
				<span style='  font-weight: bold;text-transform: uppercase;'>Error: </span>
					Inter Username and Password !</div>";
		}
	
	//if ($count == 0) {
		//echo "<div align='center' style='color: #555;border-radius: 10px;font-family: Tahoma, Geneva, Arial;font-size: 11px;padding: 10px 10px 10px 36px;margin: 20px 300px 0 300px;;background: pink;border: 1px solid #f2c779;'>
		//		<span style='  font-weight: bold;text-transform: uppercase;'>Error: </span>
		//			Your Username or Password is wrong. Please try again !</div>";

	//} else {
	//	$_SESSION['username'] = $username;
	//	$_SESSION['id']=$row['id'];
	//	header('Location:home.php');
	//}
		 	
   
}
?>


<script src="./animate.js"></script>


</body>
</html>