<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    $username = $_SESSION['username'];
    $sql = mysqli_query($conn, "select *from $tb_name WHERE  username = '$username'");
    $row = mysqli_fetch_array($sql);
    if ($row['role'] == 'USER' || $row['role'] == 'EMPLOYEE') {
        $_SESSION['role'] = $row['role'];
        ?>
        <script>
            window.alert("You do not have role to access this page");
            window.location = "home.php"
        </script>
        <?php
    } else {
        $sql2=mysqli_query($conn,"select * from $questions")
        ?>

         <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>LIST MEMBERS</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<link  type="text/css" href="style.css" rel="stylesheet">
			<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
        </head>
        <body>
		<?php require_once('NavBar.php');?>

<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>
        <div class="col-sm-12" >
			<br/><br/>
        <table  class="table table-bordered text">
            <tr ><p style="font-size: 20px" class = "text">LIST QUESTIONS</p></tr>
            <thead>
			<tr>
			<th></th>
				<th><input class="form-control" id="myInput" type="text" placeholder="Search.."></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>			
            <tr>
			<th><p style="margin: 5px 5px 5px 5px">STT</p></th>
                <th><p style="margin: 5px 5px 5px 5px">Question</p></th>
                <th><p style="margin: 5px 5px 5px 5px">A</p></th>
                <th><p style="margin: 5px 5px 5px 5px">B</p></th>
                <th><p style="margin: 5px 5px 5px 5px">C</p></th>
                <th><p style="margin: 5px 5px 5px 5px">D</p></th>
                <th><p style="margin: 5px 5px 5px 5px">Correct</p></th>
				<th><p style="margin: 5px 5px 5px 5px">Update</p></th>
            </tr>
			
            </thead>
			
            <tbody id="myTable">
			
			<form action="" method="get">
		
			<?php
				$sql2=mysqli_query($conn,"select *from $subject");
			?>
			<select  class="form-control" id="id_subject" name="id_subject">	
			<option value = "none" style ="display: none"> Chọn Môn Thi</option>
			<?php
				while ($result = mysqli_fetch_array($sql2)) {
			?>
				<option value="<?=$result['id_subject'] ?>"><?=$result['subject_name'] ?></option>
			<?php
				}
			?>     
			</select>
							
			<input type="submit" style="margin-top:15px;margin-bottom:15px" name="btn_submit" value="Search" class="btn btn-success">
			<a style = "margin-left:5px;" class="btn btn-info"  href="PDF.php?id_subject=<?php echo $_GET['id_subject']?>">Đề Giấy</a>
			</form>
            <?php
			
			if(isset($_GET["btn_submit"]) && isset($_GET['id_subject']) && $_GET['id_subject'] != 'none' ){
			$mon= $_GET['id_subject'];
				if($_GET['id_subject']){
					$sql2=mysqli_query($conn,"select * from $questions where id_subject = $mon");
					$name=mysqli_query($conn,"select subject_name from $subject where id_subject = $mon  ");
					$result1 = mysqli_fetch_array($name);
				
				}
			$count = 0;
            while ($result = mysqli_fetch_array($sql2)) {
				$count++;
                ?>
				
                <tr >
					<td><?= $count ?></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['ans1'] ?></td>
                    <td><?= $result['ans2'] ?></td>
                    <td><?= $result['ans3'] ?></td>
                    <td><?=$result['ans4']?></td>
					<td>
						<?php 
							if($result['ans'] == 1)
								echo 'A';
							else if($result['ans'] == 2)
								echo 'B';
							else if($result['ans'] == 3)
								echo 'C';
							else 
								echo 'D';
						?>
					</td>
					<td>
						<a href="update_question.php?id_question=<?=$result['id_question']?>&id_subject= <?=$mon ?>" class= "btn btn-warning">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Edit
						</a>
					</td>
                </tr>
                <?php

            }
			}else{
				echo '<h3 style="color:#FF7600"><i>Vui Lòng Chọn Môn Học</i></h3>';
			}
            ?>
            </tbody>
			<?php 
			if(isset($_GET['btn_submit'])){
				if($_GET['id_subject'] == 'none'){
					echo ' ';
				}
				else if(isset($mon)){
					echo '<h1 class = "text">' .$result1['subject_name']. '</h1>';
				}
			}
			
			else{
				echo '<h3>Vui Lòng Chọn Môn</h3>';
			}
			?>
			
        </table>
</div>
<br/><br/><br/>
	<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
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

<?php 
echo $result['name'];
?>