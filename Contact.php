<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  type="text/css" href="./styleLogin.css" rel="stylesheet">
	<link  type="text/css" href="./style.css" rel="stylesheet">
	<link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<style>

</style>
<body>

      <?php require_once('NavBar.php');?>
    
        <div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action="">
                <h3>Send Feedback</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name *"  />
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Your Email *"  />
                        </div>
                        <div class="form-group">
						  
						  <?php
								$sql2=mysqli_query($conn,"select *from $subject");
							?>
							<select  class="form-control" id="monthi" name="monthi">	
							<?php
								while ($result = mysqli_fetch_array($sql2)) {
							?>
								<option value="<?=$result['subject_name'] ?>"><?=$result['subject_name'] ?></option>
							<?php
							}
							?>     
							</select>
						</div>
						<div class="form-group">
							<label class="radio-inline"><input type="radio" name="op" value="0" >Không Hài Lòng</label>
							<label class="radio-inline"><input type="radio" name="op" value="1" >Hài Lòng</label>
							<label class="radio-inline"><input type="radio" name="op" value="2">Rất Hài Lòng</label>
						</div>
                        <div class="form-group">
                            <input type="submit" name="btn_submit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="text" id="text" class="form-control" placeholder="Ý Kiến Đóng Góp *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
      <?php
        if (isset($_POST["btn_submit"])) {

            $name= $_POST['name'];
            $email = $_POST['email'];
			$monthi = $_POST['monthi'];
			
            if($_POST['op'] == '0'){
				$op = 'Không Hài Lòng';
			}else if($_POST['op'] == '1'){
				$op = 'Hài Lòng';
			}
			else{
				$op = 'Rất Hài Lòng';
			}
			$text = $_POST['text'];
			
             if($name == '' || $email == '' || $monthi == '' || $op == '' || $text == '')
             {
                ?>
                <script>
                window.alert("Nhập đủ thông tin");
                window.location="Contact.php"
                </script>
                <?php
             }
             else{
                $sql = "INSERT INTO $feedback(name, email, subject_name, opinion, evaluate) VALUES ('$name','$email','$monthi','$op','$text')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                window.alert("Success");
                window.location="Contact.php";
                </script>
             <?php

            }
			
date_default_timezone_set('Etc/UTC');

require './sendmail/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "nhiyentran8@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Dang0918930113";

//Set who the message is to be sent from
$mail->setFrom('nhiyentran8@gmail.com', 'Quiz Online');

//Set an alternative reply-to address
$mail->addReplyTo('nhiyentran8@gmail.com', 'Quiz Online');

//Set who the message is to be sent to
$mail->addAddress($email, $name);

//Set the subject line
$mail->Subject = ' Quiz Online';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('
	<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - GMail SMTP test</title>
</head>
<body>
	<h1>Dear : '. $name . '</h1>
	<h1 style="color:#5200FF">Welcome to Quiz Online</h1>
	<img style="width:100px;margin:auto" src="./images/te.png" />
	<p>Cám ơn bạn đã gửi phản hồi đến Quiz Online</p>
	<p>Chúc bạn có ngày làm việc vui vẻ</p>
	<p>Best !</p>
</body>
</html>

');

//Replace the plain text body with one created manually
//$mail->AltBody = $name;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
		console.log($mail->ErrorInfo);
	} else {
		echo "Message sent!";
	}			
}     
?>
		
		
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


 