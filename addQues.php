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
            <title>Add Questions</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
            <link  type="text/css" href="./style.css" rel="stylesheet">
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
			.sidenav {
            background-color: #f1f1f1;
            height: auto%;
            margin-left:2%;
            
            }
		  </style>
        </head>
<body>
    <script>
           		
		function displaySuccess(message) {
			$("#success-message").html(message);
			$("#success-message-alert").fadeIn(1500);
				setTimeout(function () {
					$("#success-message-alert").fadeOut(1000);
			},3000);
   		 }
		function displayFail(message) {
			$("#fail-message").html(message);
			$("#fail-message-alert").fadeIn(1500);
			setTimeout(function () {
				$("#fail-message-alert").fadeOut(1000);
			},3000);
   		 }
			function showError() {
        $("#fail-message-alert").fadeIn(1500);
        setTimeout(function () {
            $("#fail-message-alert").fadeOut(1000);
        },3000);
    }
		function checkInput() {
			if ($("#name").val() == ''){
				$("#fail-message").html("Vui lòng nhập câu hỏi");
				showError();
				$("#name").focus();
				return false;
			}

			if ($("#ans1").val() == ''){
				$("#fail-message").html("Vui lòng nhập đáp án A");
				showError();
				$("#ans1").focus();
				return false;
			}

			if ($("#ans2").val() == ''){
				$("#fail-message").html("Vui lòng nhập đáp án B");
				showError();
				$("#ans2").focus();
				return false;
			}

			if ($("#ans3").val() == ''){
				$("#fail-message").html("Vui lòng nhập đáp án C");
				showError();
				$("#ans3").focus();
				return false;
			}
			if ($("#ans4").val() == ''){
				$("#fail-message").html("Vui lòng nhập đáp án D");
				showError();
				$("#ans4").focus();
				return false;
			}

			return true;
		}
  </script>
	   <?php require_once('NavBar.php');?>
	
<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>
<br/><br/>
	<div id="success-message-alert" class="alert alert-success" style="max-width: 500px; margin: auto; text-align: center;display:none">
        <span id="success-message"></span>
    </div>
	<div id="fail-message-alert" class="alert alert-danger" style="max-width: 500px; margin: auto; text-align: center; display: none">
        <span id="fail-message"></span>
    </div>
    <div class ="col-sm-12">
	
	<form action="addQues.php" method="post" onsubmit="return checkInput()" >
					<div class="form-group row col-md-10" style="font-size:18px;float:left;text-align:left;margin-left:20%">	
							<label class="control-label text">Chọn Môn Thi:</label>
							<?php
								$sql2=mysqli_query($conn,"select *from $subject");
							?>
							<select  class="form-control" id="id_subject" name="id_subject">	
							<?php
								while ($result = mysqli_fetch_array($sql2)) {
							?>
								<option value="<?=$result['id_subject'] ?>"><?=$result['subject_name'] ?></option>
							<?php
							}
							?>     
							</select>
							
							
						
							<label style="font-size:18px" class="text">Nhập Câu Hỏi:</label></td>
							<input class="form-control " type="text" placeholder="Enter Question" id="name" name="name" style="height: 45px; margin-bottom:20px;">
							
							
							<label style="font-size:18px"  class="text">Câu trả lời A:</label></td>
							<input class="form-control" type="text" placeholder="Enter Ans 1" id="ans1" name="ans1" style="height: 45px; margin-bottom:20px;">
							
							
							<label style="font-size:18px"  class="text">Câu trả lời B:</label></td>
							<input class="form-control" type="text" placeholder="Enter Ans 2" id="ans2" name="ans2" style=" height: 45px; margin-bottom:20px;">
							
							<label style="font-size:18px"  class="text">Câu trả lời C:</label></td>
							<input class="form-control" type="text" placeholder="Enter Ans 3" id="ans3" name="ans3" style=" height: 45px;  margin-bottom:20px;">
							
							<label style="font-size:18px"  class="text">Câu trả lời D:</label></td>
							<input class="form-control" type="text" placeholder="Enter Ans 4" id="ans4" name="ans4" style=" height: 45px;margin-bottom:20px;">
							<label style="font-size:18px"  class="text">Đáp Án :</label></td>
							<select  class="form-control" id="ans" name="ans">
								<option value="1">A</option>
								<option value="2">B</option>
								<option value="3">C</option>	
								<option value="4">D</option>									  
							</select>
							<input type="submit" style="margin-top:15px" name="btn_submit" value="Add Question" class="btn btn-success">
							<a href="./question.php" class="btn btn-info"style="margin-top:15px">List Question</a>		
						</div>
				</form>
    </div>
</div>

    
       
        <?php
        if (isset($_POST["btn_submit"])) {
            
    
            $id_subject= $_POST['id_subject'];
            $name = $_POST['name'];
            $ans1 = $_POST['ans1'];
            $ans2 = $_POST['ans2'];
            $ans3 = $_POST['ans3'];
            $ans4 = $_POST['ans4'];
			$ans = $_POST['ans'];
			$sql_count=mysqli_query($conn,"select count(*) as dem from $questions where id_subject = '$id_subject'");
			$row = $sql_count->fetch_assoc();
			$dem = $row['dem'];
			if($dem >= 10){
				echo "<script>displayFail('Đề Thi Đã Đủ Câu Hỏi')</script>";
			}
			else {
				$sql = "INSERT INTO question(name, ans1, ans2, ans3, ans4, ans,id_subject) VALUES ('$name','$ans1','$ans2','$ans3','$ans4','$ans','$id_subject')";
				mysqli_query($conn, $sql);
			echo "<script>displaySuccess('Thêm Câu Hỏi Thành Công')</script>";
			}
		
               
        ?>
             <!-- <script>
           		// window.alert("Success");
				function displaySuccess(message) {
					$("#success-message").html(message);
					$("#success-message-alert").fadeIn(1500);
					setTimeout(function () {
						$("#success-message-alert").fadeOut(1000);
					},3000);
   				 }
            </script> -->
				
         <?php

       
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