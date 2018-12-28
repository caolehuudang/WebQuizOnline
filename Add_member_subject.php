<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    if(isset($_POST['add'])){
        $id_member = $_POST['id_member'];
        $id_subject = $_POST['id_subject'];
        $checked = 1;

        $sql = "INSERT INTO member_subject (id_member,id_subject,checked) VALUES ('$id_member','$id_subject','$checked')";
        $result = mysqli_query($conn, $sql);
        header('Location:subject.php?id_member='.$id_member);
    }
}
?>