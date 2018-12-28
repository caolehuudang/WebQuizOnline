<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
session_start();
require_once('Config/db.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');
$id_member = $_SESSION['id_member'];

if($id_member == 1){
	$result1 = mysqli_query($conn,"SELECT DISTINCT id_member, image,name FROM chat 
	ORDER BY id_chat ASC");
	while($extract = mysqli_fetch_array($result1)) {
		?>
		 <script>
			$('input[type=checkbox]').click(function (){
			var seft = (event.target.value);
			document.cookie = "seft="+ seft;
			});

			function updateStatus(id)
			{
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						console.log(xmlhttp.responseText);
					}
				};
				xmlhttp.open("GET", "logs.php?id=" +id, true);
				xmlhttp.send();
			}
		</script>
		<?php
			if($extract['id_member'] != 1){

		
		?>
		<div class="chat_list active_chat">
            <div class="chat_people">
                <div class="chat_img"><img src="./images/<?= $extract['image'] ?>" alt="sunil"></div>
                <div class="chat_ib">
					
                  <h5><?=$extract['name'] ?><span class="chat_date">Dec 25</span></h5>
                  <p><?=$extract['id_member'] ?></p>
                </div>
				<input type="checkbox" onClick="updateStatus('<?=$extract['id_member'] ?>')" id = "id"  value ="<?=$extract['id_member'] ?>" />
            </div>
         </div>
		
		<?php	
			}
	}
}
else {
	$result1 = mysqli_query($conn,"SELECT * FROM chat where id_member = '$id_member'
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

	<hr>
	<?php	
}

}


if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
	$update = "UPDATE chat SET status = 0 WHERE id_member = '".$id."'";
	mysqli_query($conn,$update);
	

	
}

?>
