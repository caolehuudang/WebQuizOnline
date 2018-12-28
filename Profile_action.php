<?php 
// /session_start();
require_once('Config/db.php');

?>

<?php
if(isset ($_POST["submit1"])){
    $id_member = (isset ($_POST["id_member"])) ? ($_POST["id_member"]) : '';
    $description = (isset ($_POST["submit1"])) ? $_POST['desc'] : '';
    $result  = mysqli_query($conn,"UPDATE $profile SET description = '$description' WHERE id_member = $id_member");
    unset($description);
    header('Location:Profile.php?id_member='.$id_member);
}




if(isset ($_POST["submitpw"])){
    $id_member = (isset ($_POST["id_member"])) ? ($_POST["id_member"]) : '';
    
    $password_old = $_POST['password1'];
    $password_new = $_POST['password2'];
    $password_new1 = $_POST['password3'];


    // echo $password_old;
    // echo $password_new;
    // echo $password_new1;

    $result_password  = mysqli_query($conn,"select * from member where id_member = '$id_member'");
    if(mysqli_num_rows($result_password) > 0)  {
        $row = mysqli_fetch_array($result_password);
        $hashed_password = $row['password'];
        if(password_verify($password_old,$hashed_password)){
            if($password_new == $password_new1){
                $hashed_password = password_hash($password_new, PASSWORD_DEFAULT);
                $update1 = mysqli_query($conn,"UPDATE member SET password = '$hashed_password' WHERE id_member = $id_member");
               
               
                ?>
                <script>
                    window.alert("Cập nhật Password Thành Công");
                    window.location="Profile.php?id_member="+<?= $id_member?>
                </script>
                
                <?php
                //header('Location:Profile.php?id_member='.$id_member);
            }
            else {
                // echo 'NO';
                // header('Location:Profile.php?id_member='.$id_member);
                ?>
                <script>
                    window.alert("Nhập lại Password không đúng");
                    window.location="Profile.php?id_member="+<?= $id_member?>
                </script>
                
                <?php
            }
        }else {
           // header('Location:Profile.php?id_member='.$id_member);
           ?>
           <script>
               window.alert("Password không đúng");
               window.location="Profile.php?id_member="+<?= $id_member?>
           </script>
           
           <?php
        }
    }
  
}



if(isset($_POST["submit"])){
$id_member = (isset ($_POST["id_member"])) ? ($_POST["id_member"]) : '';

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $image = $_FILES["file"]["name"]; 
        $count=mysqli_query($conn,"select count(id_member) as tmp from profile where id_member = '$id_member'");
        while ($result = mysqli_fetch_array($count)) {
            if($result['tmp'] == 0){
                $sql = "INSERT INTO profile(image,id_member) VALUES ('$image','$id_member')";
                mysqli_query($conn, $sql);
            }
            else if($result['tmp'] == 1){
                mysqli_query($conn,"UPDATE $profile SET image = '$image'  WHERE id_member = $id_member");
            }
            else {
                echo 'Chọn hình ảnh';
            }
        }
        
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
header('Location:Profile.php?id_member='.$id_member);
}
?>

<?php 
    $id_subject = $_GET['id_subject'];
    $id_member_subject = $_GET['id_member'];
    if(isset($id_subject) && isset($id_member_subject)){
        echo $id_member_subject . "<br/>";
        echo $id_subject . "<br/>";
        $exam = "INSERT INTO exam_registration(id_member,id_subject) VALUES ('$id_member_subject','$id_subject')";
        mysqli_query($conn, $exam);
        ?>
            <script>
               window.alert("Đăng ký thành công");
               window.location="Profile.php?id_member="+<?= $id_member_subject?>
           </script>
        <?php
    }
?>