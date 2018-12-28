<?php 
require_once('Config/db.php');

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $role = 'USER';
    if ($password == $password1){
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    }else {
        ?>
            <script>
                 window.alert("Nhập lại Password không đúng");
                 window.location="Register.php";
            </script>
        <?php
    }
   
    $name = $_POST['name'];

    $sql2= mysqli_query($conn,"select * from $tb_name WHERE username = '$username'");
    $username_exist=mysqli_num_rows($sql2);
     if($username_exist)
     {
        ?>
        <script>
        window.alert("Username đã tồn tại");
        window.location="Register.php"
        </script>
        <?php
     }else{
        $sql = "INSERT INTO member(username, password, role,name,email) VALUES ('$username','$hashed_password','$role','$name','$email')";
        mysqli_query($conn, $sql);
        ?>
            <script>
                window.alert("Đăng Ký Thành Công");
                window.location="Register_Home.php";
            </script>
        <?php
     }

}else {
    echo 'not';
}

?>