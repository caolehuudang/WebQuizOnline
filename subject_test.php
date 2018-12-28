
<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}
else{
    $id_subject = $_GET["id_subject"];
	$username=$_SESSION['username'];
	$id_member = $_SESSION['id_member'];
	//$sql = mysqli_query($conn,"select *from $tb_name WHERE  username = '$username'");
	// $sql = mysqli_query($conn,"select *from member_subject WHERE  id_member = '$id_member'");
	// $row = mysqli_fetch_array($sql);
	// $id_subject =  ($row['id_subject']);
	//$_SESSION['subject']=$row['subject'];
	$sql1 = mysqli_query($conn,"SELECT * from member MB, subject SJ, member_subject MS WHERE MB.id_member = '$id_member' and '$id_member' = MS.id_member and SJ.id_subject = '$id_subject' and '$id_subject' = MS.id_subject");
	$row1 = mysqli_fetch_array($sql1);
	//print_r($row1['subject_name']); 
	if ($row1['role'] == 'USER' && !$row1['subject_name']) {
		$_SESSION['role'] = $row['role'];
		?>
		<script>
			window.alert("Bạn Không Có Quyền Truy Cập");
			window.location="home.php"
		</script>
		<?php
	} else {
	?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link  type="text/css" href="style.css" rel="stylesheet">
   <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
   
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		#txt {
			border:none;
			font-family:verdana;
			font-size:16pt;
			font-weight:bold;
			border-right-color:#FFFFFF;
            position: fixed;

        }
        body{
            background :orange;

        }
		.dropdown-menu{
		font-size:20px;
		color: #fffff;
		background-color: #FF7600;
		text-align:center;
	}
	</style>
</head>
<script>
	var mins;
	var secs;

	function cd() {
		mins = 1 * m("3"); // change minutes here
		secs = 0 + s(":01"); // change seconds here 
		redo();
	}

	function m(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
				break;
		}
		return(obj.substring(0, i));
	}

	function s(obj) {
		for(var i = 0; i < obj.length; i++) {
			if(obj.substring(i, i + 1) == ":")
				break;
		}
		return(obj.substring(i + 1, obj.length));
	}

	function dis(mins,secs) {
		var disp;
		if(mins <= 9) {
			disp = " 0";
		} else {
			disp = " ";
		}
		disp += mins + ":";
		if(secs <= 9) {
			disp += "0" + secs;
		} else {
			disp += secs;
		}
		return(disp);
	}

	// function redo() {
	// 	secs--;
	// 	if(secs == -1) {
	// 		secs = 59;
	// 		mins--;
	// 	}

	// 	var time = document.cookie.replace(/(?:(?:^|.*;\s*)time\s*\=\s*([^;]*).*$)|^.*$/, "$1");
	// 	console.log(time);
	// 	if(time){
	// 		var secs = time.slice(3,5);
	// 		var mins = time.slice(1,2);
	// 		document.cd.disp.value = dis(mins,secs);
	// 		//cd = setTimeout("redo()",1000);
	// 		//console.log(dis(mins,secs));
	// 	}
		
	// 	else{
	// 		document.cd.disp.value = dis(mins,secs); // setup additional displays here.
	// 		document.cookie = "time =" +dis(mins,secs);
	// 	}
		
	
	// 	if((mins == 0) && (secs == 0)) {
	// 		//window.alert("Time is up. Press OK to continue."); // change timeout message as required
	// 		window.location = "ajax.php" // redirects to specified page once timer ends and ok button is pressed
	// 	} else {
	// 		//cd = setTimeout("redo()",1000);
	// 	}
	// }
	function redo() {
		secs--;
		if(secs == -1) {
			secs = 59;
			mins--;
		}
		document.cd.disp.value = dis(mins,secs); // setup additional displays here.
		if((mins == 0) && (secs == 0)) {
			//window.alert("Time is up. Press OK to continue."); // change timeout message as required
			window.location = "ajax.php" // redirects to specified page once timer ends and ok button is pressed
		} else {
			cd = setTimeout("redo()",1000);
		}
	}

	function init() {
		cd();
	}
	window.onload = init;
	//console.log(document.cd.disp.value);
</script>
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
		  <li><a class="fa fa-home" href="index.php"> Home</a></li>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
			<span ><i class="fa fa-graduation-cap "></i></span>
			Manager
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="history.php">History</a> </li>
				<li><a href="news.php">News</a> </li>
			</ul>
		  </li>
		  <li><a class="fa fa-pencil-square-o" href="library.php"> Test</a></li>
		  
		  <li><a class="fa fa-phone" href="Contact.php"> Contact</a></li>

		<?php 
			if($_SESSION['username']){
				$id_member = $_SESSION['id_member']; 
				$role =mysqli_query($conn,"select role from member where id_member = '$id_member' ");
				$row = $role->fetch_assoc();
				if($row['role'] == 'ADMIN') {
			?>
					
			<li class="dropdown">
					<a class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown" href="#">	<?php echo $_SESSION['username'] ?>
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
					<a class="dropdown-toggle fa fa-user-circle" data-toggle="dropdown" href="#">	<?php echo $_SESSION['username'] ?>
					<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a class="fa fa-user-circle-o" href="Profile.php?id_member= <?= $_SESSION['id_member'] ?> "> ProFile</a></li>
					<li><a class="fa fa-sign-out " href="logout.php"> LogOut</a></li>
				</ul>
		  </li>
				<?php
			}
		}
		?>
		  
		</ul>
	  </div>
	</nav>
	<br/>

    <section id="banner" class="clearfix fidwidth">
        <hr width="100%">
		<section>
			<form  class="time" name="cd">
				<input class="watch" style=" border:  #ff0000 solid 2px;	background-color: red;color: white; margin-left: 60%; text-align: center" id="txt" readonly="true" type="text" value="2:00" border="0" name="disp">
			</form>
		</section>
        <hr width="100%" color="white">
        <hr width="100%" color="white">
    </section>

<?php
$sql =mysqli_query($conn,"select * from $questions where id_subject = '$id_subject'");
// $result1=mysqli_fetch_array($sql);
// $tmp = $result1['id_subject'];
$sql_subject =mysqli_query($conn,"select * from $subject where id_subject = '$id_subject'");
$result2=mysqli_fetch_array($sql_subject);
$tmp1 = $result2['subject_name'];

$sql_name =mysqli_query($conn,"select * from member where id_member = '$id_member'");
$name=mysqli_fetch_array($sql_name);

?>

<div class="container" style="text-align:center">
	<h1>Quiz Online</h1>
	<h3>Môn thi: <?= $tmp1 ?> </h3>
	<h3>Thí Sinh: <?php echo $name['name']?></h3>
</div>

<form action="./ajax.php" method="post"  class="container" id="myForm" style=" background-color: rgba(52,73,94,0.8);color:white;border-radius: 4px;margin:0 auto; margin-top: 100px;" >
    <img src="images/te.png" style="height: 100px; margin-top:-40px;
    margin-bottom: 30px; margin-left: 45%">
	<?php
	$i = 0;
	$tmp = 0;
	while($result=mysqli_fetch_array($sql)){
		$i ++;
		$get_subject = $result['id_subject'];
		
	?>
		<div class="container question">
			<div style="margin: 20px 0 0 30px" id="question_<?php echo $result['id_question'];?>" class=" col-md-12">
			<h3 class="question" style="color: rgba(255, 255, 255, 1)" id="question_<?php echo $result['id_question'];?>"><?php echo "Câu"." ".$i.":"." ".$result['name'];?></h3>
			<div class='align'>
                <input type = "hidden"  name = "get_subject" value = "<?= $get_subject?>"/>
				<input class="status" type="radio" value="1" id='<?php echo $result['id_question'];?>' name='person[<?= $i ?>]'>
				<label id='<?php echo $result['id_question'];?>' for='1'><?php echo $result['ans1'];?></label>
				<br/>
				<input class="status" type="radio" value="2" id='<?php echo $result['id_question'];?>' name='person[<?= $i ?>]'>
				<label id='<?php echo $result['id_question'];?>' for='1'><?php echo $result['ans2'];?></label>
				<br/>
				<input class="status" type="radio" value="3" id='<?php echo $result['id_question'];?>' name='person[<?= $i ?>]'>
				<label id='<?php echo $result['id_question'];?>' for='1'><?php echo $result['ans3'];?></label>
				<br/>
				<input class="status" type="radio" value="4" id='<?php echo $result['id_question'];?>' name='person[<?= $i ?>]'>
				<label id='<?php echo $result['id_question'];?>' for='1'><?php echo $result['ans4'];?></label>
				
			</div>
			<br/>
		</div>
		</div>
		<script>
		$("#myForm").change(function ()
		{
			var checked_value = $(".status:checked:first").val();
			var id_question =  <?=$result['id_question']?>;
			console.log(id_question,checked_value);
			
		});
	</script>
		
	<?php
	// echo $result['id_question'];
	// echo $tmp;
	// $_SESSION["tmp"] = $result['id_question'];
	// $tmp++;
	}
	
	?>
	
	<button type="submit" class="btn btn-success" style="font-size:20px;margin-left:50%;border-radius:4px;margin-bottom:3%">Submit</button>
</form>
	<br/>
	<p id="back-top"><a href="#" title="Back to top" class="scrollup"><span></span></a></p>
	
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
<?php
}
}
?>