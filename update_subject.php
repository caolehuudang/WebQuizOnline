<?php
require_once('Config/db.php'); 
if(isset($_GET['id_subject'])){

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Subject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script>
function showError() {
        $("#fail-message-alert").fadeIn(1500);
        setTimeout(function () {
            $("#fail-message-alert").fadeOut(1000);
        },3000);
    }
    function checkInput() {
			if ($("#subject_name").val() == ''){
				$("#fail-message").html("Vui lòng nhập tên môn thi");
				showError();
				$("#subject_name").focus();
				return false;
			}

			if ($("#desc").val() == ''){
				$("#fail-message").html("Vui lòng nhập mô tả");
				showError();
				$("#desc").focus();
				return false;
			}

			return true;
		}
</script>
<body>
<?php require_once('NavBar.php');?>

<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>
    <div class="col-sm-12" >
    <br/><br/><br/><br/><br/>
    <?php 
         $id_subject = $_GET['id_subject'];
         $sql = mysqli_query($conn, "select * from subject WHERE  id_subject = '$id_subject'");
         $result = mysqli_fetch_array($sql);
    ?>
    <form class="form-horizontal" onsubmit="return checkInput()" action="" method = "GET">
<input type="hidden" class="form-control" id="id" name="id" value = "<?= $id_subject ?>">
  <div class="form-group ">
    <label class="control-label col-sm-3 text" for="subject_name">Tên Môn Thi:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="subject_name" name="subject_name" value = "<?= $result['subject_name']?>" placeholder="Tên Môn Thi">
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-3 text" for="desc">Mô Tả:</label>
    <div class="col-sm-8"> 
      <input type="text" class="form-control" id="desc" name="desc" value = "<?= $result['description']?>" placeholder="Mô Tả">
    </div>
  </div>
    <div class="col-sm-offset-8 col-sm-5">
      <button type="submit" name = "submit" class="btn btn-warning">Update</button>
    </div>
  
</form>
<br/><br/>
<div id="fail-message-alert" class="alert alert-danger" style="max-width: 500px; margin: auto; text-align: center; display: none">
        <span id="fail-message"></span>
</div>

    </div>
</div>
<br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>
</html>

<?php
}
if(isset($_GET['submit'])){
    $subject_name = $_GET['subject_name'];
    $desc = $_GET['desc'];
    $id = $_GET['id'];
    $update = mysqli_query($conn,"UPDATE subject SET subject_name = '$subject_name', description = '$desc'
    WHERE id_subject = $id");
     ?>
     <script>
        window.location = "subjectAdmin.php?"
     </script>
     <?php
}


?>