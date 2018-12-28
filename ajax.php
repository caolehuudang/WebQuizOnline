<?php
require_once('Config/db.php');
//require_once('index.php');
require_once('subject_test.php');
	$id_subject = $_POST['get_subject'];
	
	$response = mysqli_query($conn, "select id_question, name, ans from question where id_subject = '$id_subject'");
	$ans = ($_POST['person']);
	//echo $i[5];
	//foreach ((array) $i as $re => $val){
		//echo " $re . gia tri: $val <br/>";
	//};
	$score = 0;
	$i = 1;
	while ($result = mysqli_fetch_array($response)) {
		//$i = ($_POST['person']);
		// echo $result['ans'];
		
		// echo $ans["$i"];
		// echo '<br/>';
		if ($result['ans'] == $ans["$i"]) {
			$score += 1;
		} else if ( $ans["$i"] > 10) {
			$score += 0;
		} else {
			$score += 0;
		}
		$i++;
	}
	//echo $score;
$username = $_SESSION['username'];
$sql = mysqli_query($conn, "select *from $tb_name WHERE  username = '$username'");
$row = mysqli_fetch_array($sql);

$_SESSION['id_member']=$row['id_member'];

$sql1 = mysqli_query($conn, "select * from subject WHERE  id_subject = '$id_subject'");
$row1 = mysqli_fetch_array($sql1);
$subject_name = $row1['subject_name'];

$id_member = $_SESSION['id_member'];


$sql2 = mysqli_query($conn,"insert into history (id_member,score,subject_name) VALUES ('$id_member','$score','$subject_name')");

$update = mysqli_query($conn,"UPDATE member_subject SET checked = 0 WHERE id_member = '$id_member'
and id_subject = '$id_subject'");
?>
<script language="JavaScript">
	window.location ="history.php";
</script>
