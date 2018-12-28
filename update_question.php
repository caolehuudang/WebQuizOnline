<?php 
require_once('Config/db.php');
if(isset($_GET['id_question'])){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Question</title>
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
			if ($("#name").val() == ''){
				$("#fail-message").html("Vui lòng nhập tên câu hỏi");
				showError();
				$("#name").focus();
				return false;
			}

			if ($("#ans1").val() == ''){
				$("#fail-message").html("Vui lòng nhập câu trả lời A");
				showError();
				$("#ans1").focus();
				return false;
			}
            if ($("#ans2").val() == ''){
				$("#fail-message").html("Vui lòng nhập câu trả lời B");
				showError();
				$("#ans2").focus();
				return false;
			}

			if ($("#ans3").val() == ''){
				$("#fail-message").html("Vui lòng nhập câu trả lời C");
				showError();
				$("#ans3").focus();
				return false;
			}
            if ($("#ans4").val() == ''){
				$("#fail-message").html("Vui lòng nhập câu trả lời D");
				showError();
				$("#ans4").focus();
				return false;
			}
            if ($("#ans").val() == ''){
				$("#fail-message").html("Vui lòng nhập đáp Án");
				showError();
				$("#ans").focus();
				return false;
			}
            if($("#ans1").val() == $("#ans2").val() || $("#ans1").val() == $("#ans3").val() || $("#ans1").val() ==$("#ans4").val()
            || $("#ans2").val() == $("#ans3").val() || $("#ans2").val() == $("#ans4").val() || $("#ans3").val() == $("#ans4").val()){
                $("#fail-message").html("Câu trả lời không được giống nhau");
				showError();
				return false;
            }
		

			return true;
		}
</script>
<body>
<?php require_once('NavBar.php');?>

<div class="row content col-sm-12">
<?php require_once('sideNavDemo.php'); ?>

<?php 
    $id_question = $_GET['id_question'];
    $id_subject = $_GET['id_subject'];
    $sql = mysqli_query($conn, "select * from $questions WHERE  id_question = '$id_question'");
    $result = mysqli_fetch_array($sql);
?>

<div class="col-sm-12" >
<br/><br/><br/><br/>
<form class="form-horizontal" onsubmit="return checkInput()" action="" method = "GET">
<input type="hidden" class="form-control" id="id" name="id" value = "<?= $id_question ?>">
<input type="hidden" class="form-control" id="id_js" name="id_js" value = "<?= $id_subject ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value = "<?= $result['name']?>" placeholder="Enter name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="ans1">Ans1:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="ans1" name="ans1" value = "<?= $result['ans1']?>" placeholder="Enter Ans1">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Ans2">Ans2:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="ans2" name="ans2" value = "<?= $result['ans2']?>" placeholder="Enter Ans2">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Ans3">Ans3:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="ans3" name="ans3" value = "<?= $result['ans3']?>" placeholder="Enter Ans3">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Ans4">Ans4:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="ans4" name="ans4" value = "<?= $result['ans4']?>" placeholder="Enter Ans4">
    </div>
  </div>

  <!-- <div class="form-group">
    <label class="control-label col-sm-2" for="Ans">Ans:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="ans" name="ans" value = "<?= $result['ans']?>" placeholder="Enter Ans">
    </div>
  </div> -->

  <div class="form-group">
  <label class="control-label col-sm-2" for="Ans">Ans:</label>
  <div class="col-sm-5">
    <select class="form-control" id="ans" name="ans">
        <option value="1" <?php if($result['ans'] == '1'){ echo 'selected';}else{ echo ' ';} ?>>A</option>
        <option value="2" <?php if($result['ans'] == '2'){ echo 'selected';}else{ echo ' ';} ?>>B</option>
        <option value="3" <?php if($result['ans'] == '3'){ echo 'selected';}else{ echo ' ';} ?>>C</option>
        <option value="4" <?php if($result['ans'] == '4'){ echo 'selected';}else{ echo ' ';} ?>>D</option>
    </select>
    </div>
  
    <div class="col-sm-offset-0 col-sm-5">
      <button type="submit" name = "submit" class="btn btn-warning">Submit</button>
    </div>
  </div>
</form>
<div id="fail-message-alert" class="alert alert-danger" style="max-width: 600px; margin: auto; text-align: center; display: none">
        <span id="fail-message"></span>
    </div>
</div>
</div>
</body>
</html>
<?php
}
if(isset($_GET['submit'])){
   $id_question = $_GET['id'];
   $id_subject = $_GET['id_js'];
   $name = $_GET['name'];
   $ans1 = $_GET['ans1'];
   $ans2 = $_GET['ans2'];
   $ans3 = $_GET['ans3'];
   $ans4 = $_GET['ans4'];
   $ans = $_GET['ans'];
//   echo $id_question. "<br/>". $id_subject . "<br/>". $name . "<br/>" . $ans1  . "<br/>" . $ans2  . "<br/>" . $ans3  . "<br/>" . $ans4  . "<br/>" . $ans;
   $update = mysqli_query($conn,"UPDATE $questions SET name = '$name', ans1 = '$ans1',ans2 = '$ans2',ans3 = '$ans3',
   ans4 = '$ans4', ans = '$ans' 
    WHERE id_question = $id_question");
 ?>
 <script>
    //window.alert("C");
    window.location = "question.php?id_subject=<?=$id_subject ?>&btn_submit=Search"
 </script>
 <?php   
}

?>