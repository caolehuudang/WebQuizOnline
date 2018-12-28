<?php
session_start();
require_once('Config/db.php');?>
<?php
if (isset($_SESSION['username']) == false) {
    header('Location: login.php');
}
else {
		$sql2=mysqli_query($conn,"select *from $tb_news")
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Thông Báo</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="./style.css" rel="stylesheet">
			<link href="./animations.css" rel="stylesheet">
			<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<style>
		.profile-header-container{
			margin: 0 auto;
			text-align: center;
			margin-top :0%;
		}
		.profile-header-img {
			padding: 0px;
		}
		.profile-header-img > img.img-circle {
			width: 50px;
			height: 50px;
			border: 2px solid #51D2B7;
		}

		</style>
		<body>
		<?php require_once('NavBar.php');?>
	<br/><br/><br/>
	<div class ="container">
		<div class ="col-md-10">
			<h2>Quiz Online</h2>
			<br/>
		</div>
		
	</div>
	
	<div class ="col-md-2 weather">
		<div class="animatedParent animateOnce">
			<p  class="animated bounceIn slowest" id="data"></p>
		</div>
	</div>
	
<div class="container">
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
 <div class="carousel-inner">
	 <?php
		$counter = 1;
        while ($result = mysqli_fetch_array($sql2)) {
      ?>
			<div class="item <?php if($counter <= 1){echo " active"; } ?>">
				<img id="slide" src="./images/<?=$result['image']?>" alt="<?= $result['description'] ?>" >
				<div class="carousel-caption">
					<h3><?= $result['subject_name'] ?></h3>
					<p><?= $result['description'] ?></p>
				</div>
			</div>  
     <?php
	  $counter ++;
    }
      ?>     
    <ol class="carousel-indicators">
			  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			  <li data-target="#myCarousel" data-slide-to="1"></li>
			  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
</div>   
<hr/>
	<div class="container">
		<h3 class="textSubject" id= "display_subject_name"></h3>
		<div class="panel-group animatedParent animateOnce">
		<?php
			$id_member = $_SESSION['id_member'];
			 $member_subject =mysqli_query($conn,"select *from member_subject where checked = 1 and id_member = '$id_member' ");
			 while ($row = $member_subject->fetch_assoc()) {
				$id_subject = $row['id_subject'];
		
			$sql2=mysqli_query($conn,"select *from $tb_news where id_subject = '$id_subject'");
			$count = 0;
			while ($result = mysqli_fetch_array($sql2)) {
				$tmp = $result['subject_name'];
				$dmy = $result['days'];
				$year = substr($dmy,0,4);
				$month =  substr($dmy,5,2);
				$day =  substr($dmy,8,2);
				$getDate = date("d");
				$display = $day - $getDate;
				$getMonth = date("m");
				$displayMonth = $month - $getMonth ;
				// echo $display . "<br/>";
				// echo $getDate . "<br/>";
				// echo $month . "<br/>";
				
				$count++;
				if($count > 0 && $display >= 0 && $display <= 3 && $displayMonth <= 1){
					?>
						<script>
							document.getElementById("display_subject_name").innerHTML = 'Môn Đang Thi';
						</script>
					<?php
				}
				else {
					
				}
				// echo $result['subject_name'];
			//	echo $year. '/'. $month . '/' . $day;
		  ?>
				<?php
					if($display >= 0 && $display <= 3  && $displayMonth <= 1){
				?>
					<a href = "subject_test.php?id_subject= <?=$result['id_subject']?> ">
						<div class="col-md-4 mg-top animated bounceInDown slowest">
						<div class="panel panel-success">
								<div class="panel-heading">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i> <span style="font-size:16px"><?= $result['subject_name'] ?></span>
								</div>
								<div class="panel-body">
									<p>Ngày Thi: <?=$day .'-'. $month .'-'. $year?></p>
									<p>Mô Tả: <?= $result['description'] ?></p>
									<p>Giờ thi: <?= $result['time'] ?></p>
									<p>Chúc các thí sinh làm bài thật tốt <i class="glyphicon glyphicon-star text-danger"></i></p>
								</div>
							</div>
						</div>	
			   		</a>
						<?php
					}else{ 				
				?>
		 <?php
					}
	}
}
      ?> 
		</div>	   
	</div>
	<hr/>



	<div class="container">
	<h3 class="textSubject" id= "display_subject_name1"></h3>
		<div class="panel-group animatedParent animateOnce">
		<?php
			$id_member = $_SESSION['id_member'];

			 $member_subject =mysqli_query($conn,"select *from member_subject where checked = 1 and id_member = '$id_member' ");
			 while ($row = $member_subject->fetch_assoc()) {
				$id_subject = $row['id_subject'];
		
			$sql2=mysqli_query($conn,"select *from $tb_news where id_subject = '$id_subject'");
			$count1 = 0;
			while ($result = mysqli_fetch_array($sql2)) {
				$tmp = $result['subject_name'];
				$dmy = $result['days'];
				$year = substr($dmy,0,4);
				$month =  substr($dmy,5,2);
				$day =  substr($dmy,8,2);
				$getDate = date("d");
				$display = $day - $getDate;
				$count1++;
				if($count1 > 0 && $display > 3 ){
					?>
						<script>
							document.getElementById("display_subject_name1").innerHTML = 'Môn Sắp Thi';
						</script>
					<?php
				}
				else {
					
				}
		  ?>
				<?php
					if($display > 3 ){
						?>
						<div class="col-md-4 mg-top animated swing slowest">
						<div class="panel panel-warning">
								<div class="panel-heading">
									<i class="fa fa-graduation-cap" aria-hidden="true"></i> <span style="font-size:16px"><?= $result['subject_name'] ?></span>
								</div>
								<div class="panel-body">
									<p>Ngày Thi: <?=$day .'-'. $month .'-'. $year?></p>
									<p>Mô Tả: <?= $result['description'] ?></p>
									<p>Giờ thi: <?= $result['time'] ?></p>
									<p>Chúc các thí sinh chuẩn bị thật tốt <i class="glyphicon glyphicon-star text-danger"></i></p>
								</div>
							</div>
						</div>	
						<?php
					}else{ 				
				?>
		 <?php
					}
	}
}
      ?> 
		</div>	   
	</div>
	<hr/>



	<div class="container">
		<h2 style="text-align:center">TOP 10 thí sinh có điểm thi cao nhất <i style="color:#FF7600" class="fas fa-award"></i> </h2>
		<br/>
		<div class="table-responsive container">    
		<table class="table table-striped">
    <thead style="text-align:center">
      <tr>
        <th>TOP</th>
        <th>Tên</th>
		<th>Môn Thi</th>
        <th>Điểm</th>
		<th></th>
		<th></th>
      </tr>
    </thead>
	<?php 
		$count = 0;
		$sql2=mysqli_query($conn,"SELECT * FROM $profile pl, $history hs , member mb where pl.id_member = mb.id_member and pl.id_member = hs.id_member and hs.id_member = mb.id_member
		 ORDER BY `hs`.`score` DESC LIMIT 10");
		while ($result = mysqli_fetch_array($sql2)) {
            $count += 1;
            ?>
			<tbody>
            <tr>
                <td><?= $count ?></td>
                <td><?= $result['name'] ?></td>
				<td><?= $result['subject_name'] ?></td>
                <td><?= $result['score']?></td>
				<td>
					<div class="profile-header-container">   
    					<div class="profile-header-img">
							<br/><br/>
							<img class="img-circle" src="images/<?= $result['image'] ?>" />
						</div>
					</div>
				</td>
				<td>
					<?php 
						if($count == 1){
							echo '<i style="color:#FF7600;font-size:20px" class="fas fa-award"></i></i>';
						}
						else if ($count == 2){
							echo '<i style="color:#FFC900;font-size:20px" class="fas fa-trophy"></i>';
						}
						else if ($count == 3){
							echo '<i style="color:#FF00C0;font-size:20px" class="far fa-grin-stars"></i>';
						}
						else{
							echo '<i style="color:#00A2FF;font-size:20px" class="fas fa-fist-raised"></i>';
						}
					?>
				</td>
            </tr>
 </tbody>
            <?php
        }
	?>
    
      
   
  </table>
  </div>
	</div>
	   <br/><br/>
      	 <p id="back-top"><a href="#" title="Back to top" class="scrollup" ><span></span></a></p>
    
	<footer class="container-fluid text-center">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>

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
		
		<script > 
$(document).ready(function() {
  var long;
  var lat;
  if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
      long = position.coords.longitude;
      lat = position.coords.latitude;
	  var timstp = position.timestamp;
	  var myDate = new Date(timstp).toLocaleString();
      var api = 'https://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + long + '&units=metric&appid=7cc72055cf03c02e9bf988f2a7b7b7e2';
      $.getJSON(api, function(data) {
		  $.each(data.weather, function(index,val){
			  if(data.name == 'Thanh pho Ho Chi Minh'){
				  data.name = 'TP.Hồ Chí Minh';
			  }
			  else if(data.name == 'Ha Noi'){
				  data.name = 'Hà Nội';
			  }else{
				  data.name = data.name;
			  }
			  //console.log(data.name);
			  //console.log(val.icon);
			  //console.log(data.main.temp);
			  //console.log(val.main);
			  $( "#data" ).html(data.name + "<br/>" 
			+ data.main.temp + '&deg;C' 
			+"<img src ='./images/weather/" + val.icon +".png'/>" + "<br/>"
			+ val.main
			
			);
		  });		
      });
    });
  }
});


</script>
		
		<script src="./animate.js"></script>
		<?php
	if($_SESSION['id_member'] != 1){
		require_once('chat.php');
	} 
	else{}
	 ?>
    </body>      
</html
        <?php
    }
?>