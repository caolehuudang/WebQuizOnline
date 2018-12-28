

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title>Regiter</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link  type="text/css" href="style.css" rel="stylesheet">
   <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<style>
.body {
    background-image: url(./images/coverRegister.jpg);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 810px;
    margin-top:-80px;
}
.register {
    width: 55%;
    height: auto;
    background-color: rgba(0,0,0,0.7);
    border-radius: 10px;
    margin: auto;
    margin-top:0%;
    color: floralwhite;
}
.notnull {
    color: crimson;
}
</style>
</head>
<body >
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
            if ($("#email").val() == ''){
				$("#fail-message").html("Vui lòng nhập Email");
				showError();
				$("#role").focus();
				return false;
			}
			if ($("#password").val() == ''){
				$("#fail-message").html("Vui lòng nhập password");
				showError();
				$("#password").focus();
				return false;
			}
            if ($("#password1").val() == ''){
				$("#fail-message").html("Vui lòng nhập lại password");
				showError();
				$("#password1").focus();
				return false;
			}
            if ($("#password").val() != $("#password1").val()){
				$("#fail-message").html("nhập lại password không đúng");
				showError();
				$("#password1").focus();
				return false;
			}
            if ($("#name").val() == ''){
				$("#fail-message").html("Vui lòng nhập Full name");
				showError();
				$("#name").focus();
				return false;
			}

			
		

			return true;
		}
</script>

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
<br/>


 <div class="body">
 <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div class="container register">
            <h2>Đăng ký</h2>
            <br />
            
            <form onsubmit="return checkInput()" class="form-horizontal" method = "POST" action = "./Register_action.php" >
                <div class="form-group">
                    <label class="control-label col-sm-3" htmlFor="text">Tên Đăng Nhập <span class="notnull">*</span>:</label>
                    <div class="col-sm-6">
                        <input type="text"
                            class="form-control"
                            placeholder="Tên Đăng Nhập"
                            name="username"
                            id = "username"
                        />
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" htmlFor="email">Email <span class="notnull">*</span>:</label>
                        <div class="col-sm-6">
                            <input type="email"
                            class="form-control"
                                   placeholder="Nhập email"
                                   name="email"
                                   id = "email"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" htmlFor="pwd">Password <span class="notnull">*</span>:</label>
                        <div class="col-sm-6">
                            <input type="password"
                            class="form-control"
                                   placeholder="Nhập password"
                                   name="password"
                                   id = "password"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" htmlFor="pwd">Nhập Lại Password <span class="notnull">*</span>:</label>
                        <div class="col-sm-6">
                            <input type="password"
                            class="form-control"
                                   placeholder="Nhập password"
                                   name="password1"
                                   id = "password1"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" htmlFor="pwd">Tên <span class="notnull">*</span>:</label>
                        <div class="col-sm-6">
                            <input type="text"
                            class="form-control"
                                   placeholder="Nhập tên"
                                   name="name"
                                   id = "name"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-8">
                            <button id="register" name ="submit" type="submit" class="btn btn-default" style="margin-bottom: 3%" >Đăng Ký</button>
                        </div>
                    </div>
                    <div id="fail-message-alert" class="alert alert-danger" style="border-radius:10px;max-width: 500px; margin: auto; text-align: center;margin-bottom: 3%;display:none">
                <span id="fail-message"></span>
            </div>
                </form>
            </div>
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
