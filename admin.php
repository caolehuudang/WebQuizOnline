
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
            window.location="home.php"
        </script>
        <?php
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Admin Page</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="./style.css" rel="stylesheet">
            <link href="animations.css" rel="stylesheet">
            <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       
        var data = google.visualization.arrayToDataTable([
            ['Điểm', 'Số lượng'],
          <?php 
           $chart_10 = mysqli_query($conn,"select count(*) as diem_10 from history where score = 10");
           $result_10 = mysqli_fetch_array($chart_10);

           $chart_89 = mysqli_query($conn,"select count(*) as diem_89 from history where score <= 9 and score >= 8");
           $result_89 = mysqli_fetch_array($chart_89);

           $chart_67 = mysqli_query($conn,"select count(*) as diem_67 from history where score <= 7 and score >= 6");
           $result_67 = mysqli_fetch_array($chart_67);

           $chart_5 = mysqli_query($conn,"select count(*) as diem_5 from history where score <= 5");
           $result_5 = mysqli_fetch_array($chart_5);

                 echo "['Điểm 10',".$result_10['diem_10']."],";
                 echo "['Điểm 8-9',".$result_89['diem_89']."],";
                 echo "['Điểm 6-7',".$result_67['diem_67']."],";
                 echo "['Điểm <= 5',".$result_5['diem_5']."],";
          ?>
        ]);
        var options = {
          title: 'Biểu Đồ Điểm Số Của User',
          is3D:true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  </head>
 <body>
<?php require_once('NavBar.php');?>

<div class="row content col-sm-12 ">
<?php require_once('sideNavDemo.php'); ?>
<div class ="col-sm-12 ">
<br>
    <h1 class="text">Thống kê</h1>
    <br><br>

	
<div class="container animatedParent animateOnce">
    <div class="row animated bounceInDown slowest">
        <?php
                    $sql = mysqli_query($conn,"select  count(*) as 'count_Employee'  from member WHERE  role = 'EMPLOYEE'");
                    $row = $sql->fetch_assoc();
                       $count_Employee = $row['count_Employee'];
                        ?> 
                        <div class="col-lg-4">
                            <div class="our-team-main">
                                <div class="team-front">
                                    <img src="http://placehold.it/110x110/9c27b0/fff?text=<?= $count_Employee?>" class="img-fluid" />
                                    <h3>Tổng Số Nhân Viên</h3>
                                </div>
                                <div class="team-back">
                                        <span>
                                      <b>Bao gồm :</b>   <br>
                                       <?php 
                                         $sql1 = mysqli_query($conn,"select  name from member WHERE  role = 'EMPLOYEE'");
                                            while ($result = mysqli_fetch_array($sql1)) {
                                        ?>
                                            +   <?= $result['name'] ?> <br/>
                                        <?php
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
        <?php
            $sql_user = mysqli_query($conn,"select  count(*) as 'count_User'  from member WHERE  role = 'USER'");
            $row_user = $sql_user->fetch_assoc();
            $count_user = $row_user['count_User'];
        ?> 
        <div class="col-lg-4">
            <div class="our-team-main">
                <div class="team-front">
                    <img src="http://placehold.it/110x110/2196f3/fff?text=<?=$count_user?>" class="img-fluid" />
                    <h3>Tổng Số User</h3>
                </div>
                <div class="team-back">
                    <span>
                 <b>TOP 5 Thí Sinh Có Điểm Cao Nhất </b>  <br/>
                    <?php 
                         $sql1 = mysqli_query($conn,"SELECT name, score, subject_name from history,member WHERE history.id_member = member.id_member ORDER BY score DESC LIMIT 5");
                            while ($result = mysqli_fetch_array($sql1)) {
                    ?>
                         +   <?= $result['name']?> - <?= $result['subject_name']?> - <?= $result['score']?>  <br/>
                    <?php
                           }
                     ?>
                    </span>
                </div>
            </div>
        </div>

        

        
        <?php
            $sql_subject = mysqli_query($conn,"select  count(*) as 'count_subject' from subject");
            $row_subject = $sql_subject->fetch_assoc();
            $count_subject = $row_subject['count_subject'];
        ?> 
        <div class="col-lg-4">
            <div class="our-team-main">
                <div class="team-front">
                    <img src="http://placehold.it/110x110/4caf50/fff?text=<?=$count_subject ?>" class="img-fluid" />
                    <h3>Tổng Số Môn Thi</h3>
                </div>
                <div class="team-back">
                    <span>
                  <b> Bao gồm </b> <br/>
                    <?php 
                         $sql2 = mysqli_query($conn,"SELECT subject_name from subject");
                            while ($result1 = mysqli_fetch_array($sql2)) {
                    ?>
                         +   <?= $result1['subject_name']?> <br/>
                    <?php
                           }
                     ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class= "container animatedParent animateOnce">
         <div class ="animated bounceIn slowest chart" id="piechart"></div>
    </div>
</div>


  <p id="back-top"><a href="#" title="Back to top" class="scrollup" ><span></span></a></p>
  
    <?php
        }
    ?>
	<script>
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});

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

	</script>
    	<script src="./animate.js"></script>
<br/><br/><br/>
    <footer id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
   
</body>
</html>

    <?php
    }
?>