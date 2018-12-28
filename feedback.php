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
		$sql2=mysqli_query($conn,"select *from feedback");
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Feedback</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="style.css" rel="stylesheet">
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
			.sidenav {
            background-color: #f1f1f1;
            height: auto%;
            margin-left:2%;
            
            }
		  </style>
        </head>
		<body>
		<?php require_once('NavBar.php');?>
	

	<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>

	<div class="col-sm-12">
    <br/><br/><br/><br/>
	
		<table class="table table-hover text">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
		<th>Môn Thi</th>
        <th>Đánh Giá</th>
        <th>Ý Kiến Đóng Góp</th>
		<th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
	 <?php
            $sql2=mysqli_query($conn,"select * from feedback");
            $count = 0;
            
            while ($result = mysqli_fetch_array($sql2)) {
                ?>

                <tr >
                    <td><?= $result['id'] ?></td>
					<td><?= $result['name'] ?></td>
                    <td><?= $result['email'] ?></td>
                    <td><?= $result['subject_name'] ?></td>
                    <td><?= $result['opinion'] ?></td>
                    <td><?=$result['evaluate']?></td>
                    <td>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button>
					<a onclick="return confirm('Are you sure want to delete this news?')" href="deleteFB.php?id=<?=$result['id']?>" class="btn btn-danger">Delete
					</td>
					
                </tr>
				<div class="container">
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					 
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">FeedBack của <?= $result['name'] ?></h4>
						</div>
						<div class="modal-body">
						  <p><?= $result['email']?></p>
						  <p><?= $result['opinion'] ?></p>
						</div>
						
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div>
				</div>
				
                <?php
				$count++;
            }
            ?>
     
    </tbody>
  </table>
</div>
</div>
<hr/>


       
       
        <?php
        if (isset($_POST["btn_submit"])) {
            //l?y thông tin t? các form b?ng ph??ng th?c POST
            //$id = $_POST['id'];
            $subject = $_POST['subject'];
            $decr = $_POST['decr'];
            $date = $_POST['date'];
			$time = $_POST['time'];
			$image = $_POST['image'];

            //$sql2= mysqli_query($conn,"select * from $tb_name WHERE username = '$username'");
            //$sql3=mysqli_query($conn,"select * from $tb_name WHERE id = $id");
            //$username_exist=mysqli_num_rows($sql2);
            //$id_exist = mysqli_num_rows($sql3);
             if($subject == '' || $decr == '' || $date == '' || $time =='' || $image == '')
             {
                ?>
                <script>
                window.alert("Vui Lòng Nhập Đủ Thông Tin");
                window.location="news.php"
                </script>
                <?php
             }
             
             else{
                $sql = "INSERT INTO news( baithi, mota, ngaythi,giothi,hinhanh) VALUES ('$subject','$decr','$date','$time','$image')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                window.alert("Success");
                window.location="news.php";
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