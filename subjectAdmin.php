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
	
        </head>
        <body>

     <?php require_once('NavBar.php');?>

<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>
    
    <div class ="col-sm-12">
        <br/><br/><br/>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Môn Thi</button>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
     
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm Môn Thi</h4>
        </div>
       
       <div class="modal-body">
       <form action="subjectAdminAction.php" method ="post">
        <div class="form-group">
            <label for="subject">Tên Môn Thi:</label>
            <input type="text" class="form-control" id="subject" placeholder="Enter subject" name="subject">
        </div>
        <div class="form-group">
            <label for="description">Mô Tả:</label>
            <textarea type="text" class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
        </div>
            <button type="submit" name = "submit" class="btn btn-default">Submit</button>
    </form>
       </div>
       

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
    <div>
    <br/>


<div class="table-responsive">          
  <table class="table text">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên Môn Thi</th>
        <th>Mô tả</th>
        <th>Hành Động</th>
      </tr>
    </thead>
    <?php 
		$count = 0;
		$sql2=mysqli_query($conn,"SELECT * FROM $subject ");
		while ($result = mysqli_fetch_array($sql2)) {
            $count += 1;
    ?>
    <tbody>
      <tr>
        <td><?= $count ?></td>
        <td><?= $result['subject_name'] ?></td>
        <td><?= $result['description'] ?></td>
        <td><a href="update_subject.php?id_subject=<?= $result['id_subject']?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
      </tr>
    </tbody>
    <?php
        }
	?>
  </table>
  </div>
</div>
    </div>
    </div>
</div>



<!-- <?php
        if(isset($_POST['submit'])){
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            if($subject == '' || $description ==''){
                ?>
                <script>
                      window.alert("Nhập đủ thông tin");
                </script>
                <?php
            }else{
                $sql = "INSERT INTO subject(subject_name, description) VALUES ('$subject','$description')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                      window.alert("thêm thành công");
                      window.location("subjectAdmin.php");
                </script>
                <?php
            }
          
        }
    }
?> -->
    <?php
        }
    ?>
	<script>
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});


    </script>
    <br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>
</html>

   