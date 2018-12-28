
<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Add Member</title>
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
				background-color: rgb(0, 0, 0,.4);
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

<div class="col-sm-12" >
	<br/><br/><br/>
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
		$id_member = $_GET['id_member'];
	
		$s =mysqli_query($conn,"SELECT id_subject FROM member_subject where id_member = $id_member");
	
		while($row1 = mysqli_fetch_array($s)){
			$id_subject = $row1['id_subject'];

		$sql2=mysqli_query($conn,"SELECT * FROM member, subject where id_member = $id_member and id_subject = $id_subject ");
		while ($result = mysqli_fetch_array($sql2)) {
	
            $count += 1;
    ?>
    <tbody>
      <tr>
        <td><?= $count ?></td>
        <td><?= $result['username'] ?></td>
        <td><?= $result['role'] ?></td>
        <td><?= $result['subject_name'] ?></td>
				<td><a onclick="return confirm('Are you sure want to delete this user?')" href="Delete_member_subject.php?id_member=<?=$result['id_member']?> <?=$result['id_subject']?> " class="btn btn-danger">Delete</td>
      </tr>
    </tbody>
    <?php
			}
        }
	?>
  </table>

  </div>

     
				<form action="Add_member_subject.php" method="post" class="form-inline  col-md-6">
					<input type ="hidden" value = "<?= $id_member ?>" name = "id_member" /> 
					<p class="text" style="font-size: 20px">Thêm Môn Thi</p> <br>
					<?php
									$sql2=mysqli_query($conn,"select *from $subject");
								?>
								<select  class="form-control" id="id_subject" name="id_subject">	
								<?php
									while ($result = mysqli_fetch_array($sql2)) {
								?>
									<option  value="<?=$result['id_subject'] ?>"><?=$result['subject_name'] ?></option>
								<?php
								}
								?>     
								</select>
					<button type="submit" name="add" class=" form-inline btn btn-success">ADD</button>
					
				</form>
			
			</div>
	</div>
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
        <?php
    }
?>
	<br/><br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center;" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>
</html>