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
            <title>Admin Page</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="style.css" rel="stylesheet">
            <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
			<!-- <link  type="text/css" href="styleLogin.css" rel="stylesheet"> -->
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
            .active{
                background-color:#d90000;
                color:#fff;
  
                }
    
		 </style>
</head>
 <body>
<?php require_once('NavBar.php');?>

<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>
<div class ="col-sm-12 text">
    <br/><br/>
  <h2>Danh Sách Phê Duyệt</h2>
  <br/><br/>
  <table class="table table-hover">
    <thead>
      <tr class="success">
        <th>STT</th>
        <th>Họ Tên</th>
        <th>Môn Thi</th>
        <th>Số Lượng ĐK</th>
        <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        $count = 0;
        $dk=mysqli_query($conn,"select * from exam_registration");
        while ($result = mysqli_fetch_array($dk)) {
            $id_member =  $result['id_member'];
            $id_subject = $result['id_subject'];
            $insert_dk=mysqli_query($conn,"select * from member, subject where member.id_member = '$id_member'
            and subject.id_subject = $id_subject");
            while ($result1 = mysqli_fetch_array($insert_dk)) {
                $count++;
                $count_member =mysqli_query($conn,"select count(*) as tmp from member_subject where id_subject = '$id_subject'");
                while ($result2 = mysqli_fetch_array($count_member)) {
                ?>
                     <tr>
                        <td><?= $count?></td>
                        <td><?= $result1['name'] ?></td>
                        <td><?= $result1['subject_name'] ?></td>
                        <td><?= $result2['tmp'] ?></td>
                        <td><a href="Approved_action.php?id_member=<?=$result1['id_member']?>&&id_subject=<?=$id_subject ?>" class= "btn btn-success">Xác Nhận</a></td>
                    </tr>
                <?php
            }
        }
    }
    ?>
     
    </tbody>
  </table>
</div>
</div>



<?php
        
    }
?>
    <?php
        }
    ?>
	<script>
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});

$('a.menu').click(function(){
    $('a.menu').removeClass("active");
    $(this).addClass("active");
});
    </script>
    	<br/><br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center;" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>
</html>

   