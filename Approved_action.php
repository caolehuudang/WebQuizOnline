<?php
require_once('Config/db.php');
//checked : 1 là True, 0 là False
$id_member = $_GET['id_member'];
$id_subject = $_GET['id_subject'];
// echo $id_member ."-";
// echo $id_subject. "<br/>";
$checked = 1;
$sql =mysqli_query($conn,"select * from member_subject where id_member = '$id_member' and id_subject = '$id_subject'");
$subject_exist=mysqli_num_rows($sql);

if($subject_exist){
    //echo 'môn học đã tồn tại';
   // echo $checked;
    $update1 = mysqli_query($conn,"UPDATE member_subject SET checked = '$checked' WHERE id_member = '$id_member'
    and id_subject = '$id_subject'");
    $sql_delete ="DELETE from exam_registration WHERE id_member = '$id_member' and id_subject = '$id_subject'";
    $res =mysqli_query($conn,$sql_delete);
    // header('Location:Approved.php');
    
}else{
   // echo 'ok my friend';
    $sql1 = "INSERT INTO member_subject(id_member, id_subject, checked) VALUES ('$id_member','$id_subject','$checked')";
    mysqli_query($conn, $sql1);
    $sql_delete ="DELETE from exam_registration WHERE id_member = '$id_member' and id_subject = '$id_subject'";
    $res =mysqli_query($conn,$sql_delete);
   // header('Location:Approved.php');
}


/////Gửi Mail
$email_name =mysqli_query($conn,"select * from member where id_member = '$id_member'");
$email_subject =mysqli_query($conn,"select * from subject where id_subject = '$id_subject'");
$email=mysqli_fetch_array($email_name);
$email1=mysqli_fetch_array($email_subject);
echo $email['email'];
echo $email['name'];
echo "<br/>";
echo $email1['subject_name'];
			
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
$mail->addAddress($email['email'], $email['name']);

//Set the subject line
$mail->Subject = ' Quiz Online';

$mail->msgHTML('
	<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - GMail SMTP test</title>
</head>
<body>
	<h1>Dear : '. $email['name'] . '</h1>
	<h1 style="color:#5200FF">Welcome to Quiz Online</h1>
	<img style="width:100px;margin:auto" src="./images/quiz3.png" />
    <p>Chúc mừng bạn đã đăng ký thành công môn '. $email1['subject_name'] .'</p>
    <p>Hãy theo dõi thông báo để có thể thi thật tốt</p>
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
//header('Location:Approved.php');
	if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        $mail->ErrorInfo;
        console.log($mail->ErrorInfo);
	} else {
        echo "Message sent!";
       
    }	
   
    //$mail->send();		
    
  
?>
<script>setTimeout(function(){
     window.location="Approved.php";
}, 1);</script>
