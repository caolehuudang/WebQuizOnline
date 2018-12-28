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
 <br/> <br/> <br/>

<div class="table-responsive">          
  <table class="table text">
    <thead>
      <tr>
        <th>STT</th>
        <th>userName</th>
        <th>Role</th>
        <th>Subject</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php 
		$count = 0;
		$sql2=mysqli_query($conn,"SELECT * FROM member ");
		while ($result = mysqli_fetch_array($sql2)) {
            $count += 1;
    ?>
    <tbody>
      <tr>
        <td><?= $count ?></td>
        <td><?= $result['username'] ?></td>
        <td><?= $result['role'] ?></td>
        <td><a href="subject.php?id_member=<?=$result['id_member']?>" class="btn btn-success">Thêm Môn Thi</td>
        <td><a onclick="return confirm('Are you sure want to delete this user?')" href="delete.php?id_member=<?=$result['id_member']?>" class="btn btn-danger">Delete</td>
      </tr>
    </tbody>
    <?php
        }
	?>
  </table>
  <a class = "btn btn-primary" href = "add-member.php">Thêm Thí Sinh</a>
  </div>
</div>
    </div>
    </div>
</div>



<?php
        if(isset($_POST['submit'])){
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            $sql = "INSERT INTO subject(subject_name, description) VALUES ('$subject','$description')";
            mysqli_query($conn, $sql);
            ?>
            <script>
                  window.alert("Thêm môn thi thành công");
            </script>
            <?php
        }
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

   