<?php
session_start();
require_once('Config/db.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}else {
    if( isset($_GET['id_member']))
    {
        $tmp= $_GET['id_member'];
        $id_member = substr($tmp,0,1);
        $id_subject = substr($tmp,2,3);
     
        $sql ="DELETE from member_subject WHERE id_member = $id_member and id_subject = $id_subject";
        $res =mysqli_query($conn,$sql);
        header('Location:subject.php?id_member='.$id_member);
       
    }
}?>