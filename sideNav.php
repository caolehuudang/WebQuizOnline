
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    		
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
       .box {
            background-color: #ccc;
            height: 100%;
            text-align: center;
            margin-top : -4.5%;
           
            }
            .menu{
                font-size: 16px;
                color:black;
               
            }
            .menu:hover{
                font-size: 18px;
                color:blue;
            }
            
            .profile-header-container{
        margin: 0 auto;
        text-align: center;
        margin-top :0%;
    }
    .profile-header-img {
    padding: 10px;
}

.profile-header-img > img.img-circle {
    width: 70px;
    height: 70px;
    border: 2px solid #51D2B7;
}

.profile-header {
    margin-top: 10px;
}

</style>
<body>
<div class="col-sm-2 box ">
      <h4>
      <div class="profile-header-container">   
    		<div class="profile-header-img">
            <?php
                if(isset($_SESSION['id_member'])){
                $id_member =  $_SESSION['id_member'];
                    $sql = mysqli_query($conn,"select *from $profile WHERE  id_member = '$id_member'");
                    while ($result = mysqli_fetch_array($sql)) {
                        ?> 
                             <img class="img-circle" src="images/<?= $result['image'] ?>" />
                        <?php
                    }
                }
            ?>
             <?php
              if(isset($_SESSION['id_member'])){
                $id_member =  $_SESSION['id_member'];
                    $sql1 = mysqli_query($conn,"select *from member WHERE  id_member = '$id_member'");
                    while ($result1 = mysqli_fetch_array($sql1)) {
                        ?> 
                            <p style = "font-size:14px;margin-top:5px"> <?= $result1['name'] ?></p>
                        <?php
                    }
                }
            ?>
          <span style = "font-size:12px"><i class="fa fa-circle text-success"></i> Online</span>
        </div>
      </h4>
       <?php 
             $sql2 = mysqli_query($conn,"select count(*) as tmp from exam_registration");
             $count = mysqli_fetch_array($sql2);

             $sql3 = mysqli_query($conn,"select  count(status) as tmp from chat where status = 1");
             $count_chat = mysqli_fetch_array($sql3);
        ?>
      <ul class="nav nav-pills nav-stacked ">
	  <li ><a class="menu" href="admin.php">Thống Kê</a></li>
        <li><a class="menu" href="subjectAdmin.php">Quản Lý Môn Thi</a></li>
        <li><a class="menu" href="addQues.php">Quản Lý Câu Hỏi</a></li>
        <li><a class="menu" href="list_member.php">Quản Lý USER</a></li>
        <li><a class="menu" href="Approved.php">Xét Duyệt Đăng Ký <span style = "background-color:#b1002c;" class="badge"><?=$count['tmp'] ?></span></a></li>
        <li><a class="menu" href="feedback.php">FeedBack</a></li>
        <li><a class="menu" href="news.php">Thông Báo</a></li>
        <li><a class="menu" href="ChatAdmin.php">Chat <span style = "background-color:#b1002c;" class=" <?php
        if($count_chat['tmp'] == 0){
            echo 'aaaaa';
        }else {
            echo 'badge';
        }
        ?>
         ">
        <?php if($count_chat['tmp'] == 0){
            echo null;
        }else{
            echo $count_chat['tmp'] ;
        } 
        
        ?>
        </span></a></li>
      </ul>
      <br>
</div>

</body>
</html>