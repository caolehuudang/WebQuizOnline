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
    if ($row['role'] == 'USER') {
        $_SESSION['role'] = $row['role'];
       ?>
        <script>
            window.alert("You do not have permission to access this page");
            window.location="home.php"
        </script>
        <?php
    } else {
		$sql2=mysqli_query($conn,"select *from $tb_news");
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Thông Báo</title>
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
				color: black;
				background-color: #FF7600;
				text-align:center;
			}
		  </style>
</head>
		<body>

    <?php require_once('NavBar.php');?>
	
  
	<div class="row content col-sm-12">
  <?php
  if($row['role'] == 'ADMIN'){
    require_once('sideNavDemo.php');
  }else{

  } 
  ?>
 
  <div class="col-sm-12">
  <br/><br/><br/><br/>
		<table class="table table-hover text">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên Bài Thi</th>
        <th>Mô Tả</th>
		    <th>Ngày Thi</th>
        <th>Giờ Thi</th>
        <th>Hình Ảnh MT</th>
		    <th>Hành Động</th>
      </tr>
    </thead>
    <tbody>
	 <?php
            	$sql2=mysqli_query($conn,"select *from $tb_news");
            $count = 0;
            while ($result = mysqli_fetch_array($sql2)) {
              $count ++;
                ?>

                <tr >
                    <td><?=  $count?></td>
					          <td><?= $result['subject_name'] ?></td>
                    <td><?= $result['description'] ?></td>
                    <td><?= $result['days'] ?></td>
                    <td><?= $result['time'] ?></td>
                    <td><?=$result['image']?></td>
                    <td><a onclick="return confirm('Are you sure want to delete this news?')" href="DeleteNews.php?id=<?=$result['id']?>" class="btn btn-danger">Delete</td>
                </tr>
                <?php
            }
            ?>
     
    </tbody>
  </table>


  <h2 class ="text">Thêm Thông Báo</h2>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm Thông Báo</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
					<div class="form-group" style="font-size:15px; margin-bottom:20px;">	
							<label class="control-label">Bài Thi Môn:</label>

					
              <?php
								$sql2=mysqli_query($conn,"select *from $subject");
							?>
							<select  class="form-control" id="subject_name" name="subject_name">	
							<?php
								while ($result = mysqli_fetch_array($sql2)) {
							?>
								<option value="<?=$result['subject_name'] ?>"><?=$result['subject_name'] ?></option>
							<?php
							}
							?>     
							</select>
							
						
							<label style="font-size:15px">Mô Tả:</label></td>
							<input class="form-control" type="text" placeholder="Nhập mô tả" id="desc" name="desc" style="height: 45px; margin-bottom:20px;">
							
							
							<label style="font-size:15px">Ngày Thi:</label></td>
							<input class="form-control" type="date" placeholder="Ngày Thi" id="date" name="date" style="height: 45px; margin-bottom:20px;">
							
							
							<label style="font-size:15px">Giờ thi:</label></td>
							<input class="form-control" type="text" placeholder="Nhập giờ thi" id="time" name="time" style=" height: 45px; margin-bottom:20px;">
							
							<label style="font-size:15px">Hình Ảnh:</label></td>
							<input class="form-control" type="file" placeholder="chọn ảnh" id="image" name="image" style=" height: 45px;  margin-bottom:20px;">
							
							
							<input type="submit" style="margin-top:10px" name="btn_submit"  class="btn btn-success">
									
						</div>
					
				</form>
        </div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>

   </div>    
       
        <?php
        if (isset($_POST["btn_submit"])) {
            
            //$id = $_POST['id'];
		      	$target = "images/".basename($_FILES['image']['name']);
            $subject = $_POST['subject_name'];
            $desc = $_POST['desc'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $image = $_FILES['image']['name'];

            $sql_subject= mysqli_query($conn,"select * from subject WHERE subject_name = '$subject'");
            $result_subject = mysqli_fetch_array($sql_subject);
            $id_subject = ($result_subject['id_subject']);
            //$sql3=mysqli_query($conn,"select * from $tb_name WHERE id = $id");
            //$username_exist=mysqli_num_rows($sql2);
            //$id_exist = mysqli_num_rows($sql3);
             if($subject == '' || $desc == '' || $date == '' || $time =='' || $image == '')
             {
                ?>
                <script>
                window.alert("Vui Lòng Nhập Đủ Thông Tin");
                window.location="news.php"
                </script>
                <?php
             }
             
             else{
                $sql = "INSERT INTO news( subject_name, description, days,time,image,id_subject) VALUES ('$subject','$desc','$date','$time','$image','$id_subject')";
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
  	<br/><br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center;" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
        </body>
        </html>


        <?php
    }
?>