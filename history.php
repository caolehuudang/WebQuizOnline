<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    $username = $_SESSION['username'];
    $sql = mysqli_query($conn, "select *from $tb_name WHERE  username = '$username'");
    $row = mysqli_fetch_array($sql);
    $id_member = $_SESSION['id_member'];
	$count = 0;
    if ($row['role'] == 'USER') {
        $_SESSION['role'] = $row['role'];
        $sql2 = mysqli_query($conn, "select *from $history MS, member MB WHERE MS.id_member = '$id_member' and MB.id_member = '$id_member'");
        ?>
		 <head>
            <title>History</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link  type="text/css" href="style.css" rel="stylesheet">
			<link  type="text/css" href="styleLogin.css" rel="stylesheet">
			<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
        </head>
<body>

      	<?php require_once('NavBar.php');?>
		<div class="container">
		<h3 style="color:yellow">HISTORY</h3>
		 <table style=" font-size:20px;color:yellow"  class="table ">  
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Subject</th>
				<th>Score</th>
			</tr>
		</thead>
        <?php	
			while ($result = mysqli_fetch_array($sql2)) {
				$count += 1;
				?>
				<tbody>
				<tr>
					<td><?= $count ?></td>
					<td><?= $result['name'] ?></td>
					<td><?=$result['subject_name']?></td>
					<td><?= $result['score'] ?></td>
				</tr>
				</tbody>
				<?php
			}
        ?>
        </table>
        </div>
		<script>
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});

	</script>
</body>
        <?php

    }

     else {
        $sql2=mysqli_query($conn,"select *from $history hs, member mb where hs.id_member = mb.id_member");
    ?>

          <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>History</title>
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
	
		  </style>
        </head>
        <body>

      <?php require_once('NavBar.php');?>

        <br/> <br/> <br/>
        <section>
        <div class="container ">
	<table class="table table-responsive" >
		<thead>
            <tr ><p style="font-size: 20px;text-align:center">USER'S HISTORY</p></tr>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Score</th>
        </tr>
		</thead>

		<?php
		
        while ($result = mysqli_fetch_array($sql2)) {
            $count += 1;
			?>
		<tbody>
            <tr>
                <td><?= $count ?></td>
                <td><?= $result['name'] ?></td>
                <td><?= $result['subject_name']?></td>
                <td><?= $result['score'] ?></td>
            </tr>
		</tbody>
            <?php
        }

        ?>

    </table>
	<br/>
     <a style="margin-bottom:10px" onclick="return confirm('Are you sure want to delete all history?')"href="history.php?delete"class="btn btn-danger">Delete</a>
</section>
<br/><br/><br/><br/><br/><br/><br/><br/>
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
        if(isset($_GET['delete']))
        {
        $del = mysqli_query($conn,"delete from history ");
        //header('Location:history.php');
        }
}
}
?>