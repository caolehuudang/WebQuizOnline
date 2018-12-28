<?php
session_start();
require_once('Config/db.php');
if(isset($_COOKIE['seft'])){
$id_chat =  $_COOKIE['seft'];	
$id_member = $_SESSION['id_member'];

if($id_member == 1){
	$result1 = mysqli_query($conn,"SELECT * FROM chat where id_member ='$id_chat'
	ORDER BY id_chat ASC");
	$count = 0;
	while($extract = mysqli_fetch_array($result1)) {
       
		?>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="./images/<?= $extract['image'] ?>" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?= $extract['messenger']?></p>
                  <span class="time_date"><?= $extract['time'] ?></span></div>
              </div>
            </div>
        <?php
      
       
        }	
        $count = $count +1;
	
}
else {
	$result1 = mysqli_query($conn,"SELECT * FROM chat,member,profile where chat.id_member = '$id_member' and member.id_member = '$id_member'
and profile.id_member = '$id_member' and id_admin = 1
ORDER BY id_chat ASC");

while($extract = mysqli_fetch_array($result1)) {
	?>
				<div class="chat-message clearfix">
			
					<img src="images/<?=$extract['image'] ?>" alt="" width="32" height="32">

					<div class="chat-message-content clearfix">
						
						<span class="chat-time"><?= $_SESSION['role'] ?></span>

						<h5><?=$extract['name'] ?> </h5>

						<p><?= $extract['messenger']?></p>

					</div> 
				</div> 

	<hr>
	<?php	
}
}
}else{
	echo ' Chọn tin nhắn';
}
?>
