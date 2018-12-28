<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    if( isset($_GET['id_member']))
    {
        $id= $_GET['id_member'];
        $sql ="DELETE from member WHERE id_member = $id";
        $res =mysqli_query($conn,$sql);
        header('Location:list_member.php');
 
    }
}?>