<?php
$server="localhost";
$user ="root";
$pwd="";
$db = "quizonline";
$tb_name="member";
$tb_news="news";
$feedback="feedback";
$questions="question";
$subject ="subject";
$member_subject ="member_subject";
$profile = "profile";
//$questions2="quest2";
//$questions3="quest3";
$history = "history";

$conn= new mysqli($server,$user,$pwd,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}


function getConnection(){
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "quizonline";
    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

//hien thi font unicode
mysqli_query ($conn,"set character_set_client='utf8'");
mysqli_query ($conn,"set character_set_results='utf8'");
mysqli_query ($conn,"set collation_connection='utf8_general_ci'");
?>