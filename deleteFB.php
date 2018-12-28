<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    if( isset($_GET['id']))
    {
        $id= $_GET['id'];
        $sql ="DELETE from feedback WHERE id = $id";
        $res =mysqli_query($conn,$sql);
        header('Location:feedback.php');
 
    }
}?>