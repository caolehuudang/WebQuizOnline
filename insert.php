<?php
session_start();
require_once('Config/db.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$admin = $_SESSION['id_member'];
if($admin == 1){
	$id_member =$_COOKIE['seft'];
	$result  = mysqli_query($conn,"select * from member, profile where member.id_member = '$admin' and profile.id_member ='$admin'");
	$row =  $result->fetch_assoc();
	$image =  $row['image'];
	$name =  $row['name'];
	
	$msg = $_REQUEST['msg'];
	$time = date("h:i:sa");
	$status = 0;
	mysqli_query($conn,"INSERT INTO chat (`id_member`, `messenger`, `image`,`name`,`time`,`status`) VALUES ('$id_member','$msg','$image','$name','$time','$status')");
	
	$result1 = mysqli_query($conn,"SELECT * FROM chat where id_member ='$id_member'
	ORDER BY id_chat ASC");
	while($extract = mysqli_fetch_array($result1)) {
	
		?>
			<div class="incoming_msg">
			  <div class="incoming_msg_img"> <img src="./images/<?= $extract['image'] ?>" alt="sunil"> </div>
			  <div class="received_msg">
				<div class="received_withd_msg">
				  <p><?= $extract['messenger']?></p>
				  <span class="time_date"> <?= $extract['time']?></span></div>
			  </div>
			</div>
		
		<?php
		}	
		
	
}else {
	$result  = mysqli_query($conn,"select * from member, profile where member.id_member = '$admin' and profile.id_member ='$admin'");
	$row =  $result->fetch_assoc();
	$image =  $row['image'];
	$name =  $row['name'];
	$time = date("h:i:sa");
	$status = 1;
	$msg = $_REQUEST['msg'];
	mysqli_query($conn,"INSERT INTO chat (`id_member`, `messenger`, `image`,`name`,`time`,`status`) VALUES ('$admin','$msg','$image','$name','$time','$status')");	

	$result1 = mysqli_query($conn,"SELECT * FROM chat where id_member ='$admin'
	ORDER BY id_chat ASC");
	while($extract = mysqli_fetch_array($result1)) {
		
		?>
			<div class="chat-message clearfix">
			
			<img src="images/<?=$extract['image'] ?>" alt="" width="32" height="32">

			<div class="chat-message-content clearfix">
				
				<span class="chat-time"><?=$extract['time'] ?></span>

				<h5><?=$extract['name'] ?> </h5>

				<p><?= $extract['messenger']?></p>

			</div> 
		</div> 

		<?php
		
	}
	
}

?>
