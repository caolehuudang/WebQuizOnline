<?php 
// /session_start();
require_once('Config/db.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ProFile</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  type="text/css" href="./style.css" rel="stylesheet">
    <link rel= " shortcut icon" href="images/logo1.jpg" type="image/ico">
    
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
    .profile-header-container{
        margin: 0 auto;
        text-align: center;
        margin-top :0%;
    }
    .profile-header-img {
    padding: 54px;
}

.profile-header-img > img.img-circle {
    width: 120px;
    height: 120px;
    border: 2px solid #51D2B7;
}

.profile-header {
    margin-top: 30px;
}


.rank-label-container {
    margin-top: -19px;
    text-align: center;
}

.label.label-default.rank-label {
    background-color: rgb(81, 210, 183);
    padding: 5px 10px 5px 10px;
    border-radius: 27px;
}

.modal-form1{
    margin-top :10%;
}

.profile{
    background-color : green;
}


</style>
</head>
<body class="background">
<?php require_once('NavBar.php');?>
<br/><br/><br/><br/><br/><br/><br/>

<div class="container ">
	<div class="row">
        <div class="profile-header-container">   
    		<div class="profile-header-img">
            <?php
                $count = 0;
                $id_member =  $_SESSION['id_member'];
                    $sql = mysqli_query($conn,"select *from $profile WHERE  id_member = '$id_member'");
                    while ($result = mysqli_fetch_array($sql)) {
                        ?> 
                             <img class="img-circle" src="images/<?= $result['image'] ?>" />
                        <?php
                        $count++;
                    }
                    
                    if ($count == 0) {
                      ?>
                    <h5  data-toggle="modal" data-target="#myModal"><span class="label label-default rank-label">Cập nhật ảnh</span></h5>

                      <?php
                    }else {
                       
                    }
            ?>
            
            <?php
                $id_member =  $_SESSION['id_member'];
                    $sql1 = mysqli_query($conn,"select description from $profile WHERE  id_member = '$id_member'");
                    while ($result = mysqli_fetch_array($sql1)) {
                        ?> <span class="desc" id = <?=  $_GET['id_member'] ?>>
                                 <h3 data-target = "description"><i> <?=$result['description']?></i></h3>
                            </span>
                          
                        <?php
                    }
            ?>

        <h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
            <a data-role="update" data-id = <?=  $_GET['id_member'] ?> data-toggle="modal" data-target="#myModal1">
                Chỉnh sửa tiểu sử
            </a>
        </h5>


                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật ảnh đại diện</h4>
                        </div>
                        <div class="modal-body">
                        <form action = "Profile_action.php" method = "POST" class="form-inline" enctype="multipart/form-data">
                        <input  type = "hidden" name ="id_member" id ="id_member" value ="<?=$_GET['id_member'] ?>" />
                            <input class="form-control" type = "file" name = "file" value ="file" /> 
                            <input class="form-control btn btn-primary" type = "submit" name = "submit" value ="Cập nhật ảnh" />
                          </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                </div>
</div>
            </div>
        </div> 
	</div>
</div>

 


<div class = "container">
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chỉnh sửa tiểu sử</h4>
        </div>
        <div class="modal-body">
            <form action = "Profile_action.php" class = "form-inline" method = "POST">
                <textarea rows  ="4" cols="50" name = "desc" id = "desc"></textarea>
                <input type = "hidden" name ="id_member" id ="id_member" value ="<?=$_GET['id_member'] ?>" />
                <br/>
                <input class="btn btn-info" type = "submit" name = "submit1" id ="submit1" value ="Cập nhật" />
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>


<div class="container private">
    <h2>Chỉnh sửa thông tin cá nhân</h2>
  <?php
    $updatepw = mysqli_query($conn,"select * from member WHERE  id_member = '$id_member'");
    while ($updatepw_child = mysqli_fetch_array($updatepw)) {
        ?>
           
            <div>UserName: <?=$updatepw_child['username'] ?></div>
            <h5>PassWord: ****** <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <a data-role="update" data-id = <?=  $_GET['id_member'] ?> 
                data-toggle="modal" data-target="#updatepw">Chỉnh sửa Password
                </a>
            </h5>


                <div class="modal fade" id="updatepw" role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật PassWord</h4>
                        <div id= "error" style = "color:red;text-align:center;display:none">Nhập lại Password không đúng</div>
                        </div>
                        <div class="modal-body">
                        
                        <form action = "Profile_action.php" method = "POST" class="form-inline">
                            <input  type = "hidden" name ="id_member" id ="id_member" value ="<?=$_GET['id_member']?>" />
                            <label class="control-label col-sm-5" for="password1">Password hiện tại <span style="color:red">*</span>:</label>
                            <input class="form-control col-sm-7" type = "password" name = "password1" id = "password1"  />  <br/>  <br/>
                            <label class="control-label col-sm-5" for="password2">Password Mới <span style="color:red">*</span>:</label>
                            <input class="form-control col-sm-7" type = "password" name = "password2"  id = "password2"/>  <br/>  <br/>
                            <label class="control-label col-sm-5" for="password3">Nhập Lại Password Mới <span style="color:red">*</span>:</label>
                            <input class="form-control col-sm-7" type = "password" name = "password3"  id = "password3"/>    <br/>  <br/>
                            
                            <input style= "display:none" id= "submitpw" class="btn btn-primary" type = "submit" name = "submitpw" value ="Cập nhật" />
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
           
          
        <?php
    }
  ?>
</div>
<br/>

<div class = "container">
    <div class = "col-md-5" >
        <h3 style = "text-align: center">Thông Báo</h3><br/>
        <div class="panel-group" id="accordion">
        <?php 
        $notification = mysqli_query($conn,"select * from member_subject, subject,news WHERE
        member_subject.id_member = '$id_member' and member_subject.id_subject = subject.id_subject 
        and subject.id_subject = news.id_subject");
        while ($tb = mysqli_fetch_array($notification)) {
            $id_subject_notification =  $tb['id_subject'];
            $notification_child = mysqli_query($conn,"select * from news where id_subject = '$id_subject_notification'");
        while ($tb_child = mysqli_fetch_array($notification_child)) {
                $dmy = $tb_child['days'];
				$year = substr($dmy,0,4);
				$month =  substr($dmy,5,2);
                $day =  substr($dmy,8,2);
              
        ?>
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a style = "text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#<?=$tb_child['id']?>">
                    <i> Ngày <?=$day?>/<?=$month ?>/<?= $year ?>
                        Thi môn <?=$tb_child['subject_name']?>
                    </i>
                </a>
            </h4>
        </div>

        <div id="<?=$tb_child['id']?>" class="panel-collapse collapse ">
            <div class="panel-body" style = "font-size:16px; text-align:center">
               Mô tả: <?=$tb_child['description']?><br/>
               Thời gian : <?=$tb_child['time']?><br/>
            </div>
        </div>
    </div>
    <br/>
    
        <?php
        
    }
 }
?>
    </div>
</div> 

    <div class="col-md-1"></div>


    <div class = "col-md-6 container">
        <h3  style = "text-align: center">Tiến Trình</h3><br/>
      
        <?php 
        $process = mysqli_query($conn,"select * from $history where id_member = '$id_member'");
        $tb = 0;
        $diem = 0;
        while ($process_child = mysqli_fetch_array($process)) {
            $diem = $diem + $process_child['score'];
            
           ?>
         <p><?= $process_child['subject_name']?></p>
            <div class="progress">
                <div class="progress-bar 
                    <?php 
                    if($process_child['score'] == 0){
                        echo 'progress-bar-danger';
                    }
                    else if ($process_child['score'] > 0 && $process_child['score'] < 5){
                        echo 'progress-bar-warning progress-bar-striped active';
                    }
                    else if ($process_child['score'] >= 5 && $process_child['score'] <= 7){
                        echo 'progress-bar-info progress-bar-striped active';
                    }
                    else{
                        echo 'progress-bar-success progress-bar-striped active';
                    }
                    ?>
                    "
                    role="progressbar"
                    aria-valuenow="<?php echo $process_child['score'];?>"
                    aria-valuemin="0"
                    aria-valuemax="10"
                   
                    style="width:
                    <?php
                        if($process_child['score'] == 0){
                            echo '10';
                        }else{
                            echo $process_child['score'];
                        } 
                    ?>0%"
                   >
                    <?php if($process_child['score'] == 0){
                        echo '<div>0 Điểm</div>';
                    }
                    else{
                        echo  $process_child['score'];
                    }
                     ?>/<b>10 Điểm</b>
                </div>
            </div>
           
           <?php
           $tb++;
        }
        if($diem != 0){
        $dtb =  $diem / $tb;
       
            if($dtb > 7){
            ?>
                <hr/>
                <a href= "game.php" class="btn btn-warning">Vào chơi game</a>
            <?php
            }else {
                echo 'Trung bình điểm thi từ 7 trở lên sẽ được chơi game';
            }
        }else{
            echo '<h4 style = "text-align:center">Bạn chưa tham gia thi</h4>';
        }
        ?>
        
  </div>
</div>
</div>
<br/><br/><br/>

<div class="container">
  <h2>Đăng Ký Môn Thi</h2>
  <h4>Các thí sinh đăng ký môn thi</h4>
  <br/>
  <table class="table table-bordered" style = "text-align:center">
    <thead >
      <tr>
        <th style = "text-align:center">STT</th>
        <th style = "text-align:center">Môn Thi</th>
        <th style = "text-align:center">Mô Tả</th>
        <th style = "text-align:center">Số Lượng</th>
        <th style = "text-align:center">Hành Động</th>
      </tr>
    </thead>
    <tbody>

    <?php 
        $count1 = 0;
       // echo $id_member;
        $dk=mysqli_query($conn,"select * from subject");
        while ($result = mysqli_fetch_array($dk)) {
            $count1++;
            $count_member_subject = $result['id_subject'];
            $member_subject=mysqli_query($conn,"select count(*) as tmp from member_subject where id_subject = '$count_member_subject'");
            while ($result_count = mysqli_fetch_array($member_subject)) {
            $id_subject = $result['id_subject'];
        ?>
            <tr class="warning">
                <td><?= $count1?></td>
                <td><?= $result['subject_name']?></td>
                <td><?= $result['description']?></td>
                <td><?= $result_count['tmp']?></td>
                <td><a  onclick="return confirm('Bạn muốn đăng ký môn <?= $result['subject_name']?> ?')" href ="Profile_action.php?id_member=<?= $id_member?>&&id_subject=<?=$id_subject?>" class = "twitter btn btn-success">Đăng Ký</a></td>
            </tr>
      
        <?php
        }
    }
    ?>
     
     
    </tbody>
  </table>
</div>


<br/><br/><br/><br/><br/>

<script>


$(document).ready(function(){
    $('.img-circle').click(function(){
        $('#myModal').modal('show');
    });
});

$(document).ready(function(){
    $(document).on('click', 'a[data-role="update"]',function(){
        var id = $(this).data('id');
        var description = $('#'+id).children('h3[data-target =description]').text();
        $('#desc').val(description);

        $('#submit1').click(function(){
            var description = $('#desc').val();
            $.ajax({
                url : 'Profile.php',
                method : post,
                data : {
                    description: description
                },
                success : function(response){
                     $('#'+id).children('h3[data-target =description]').text(description);
                    $('#desc').empty().append(response);
                }
                
            });
        });

    });
});


	$(document).ready(function(){
		
		$("#back-top").hide();
	 
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
	 
			$('#back-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 900);
				return false;
			});
		});
	 
	});
		$('ul.nav li.dropdown').hover(function() {
		 $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});


 
               $(document).ready(function() {
                    $("#password3").keyup(function() {
                        var pw2 = $('#password2').val();
                         var pw3 = $('#password3').val();
                         if(pw2 != pw3){
                             if(pw3.length == 0){
                                 $('#error').fadeOut("slow");
                            }
                            else{
                             $('#error').fadeIn("slow");
                             $('#submitpw').css("display", "none");}
                         }else{
                            $('#submitpw').css("display", "block");
                            $('#error').fadeOut("slow");
                         }
                    });
                });
           
    </script>
    	<br/><br/><br/><br/>
    <footer style="position:fixed;bottom:0px;width:100%;text-align:center;" id="whatever" class="container-fluid text-center text">
		<p>Copyright <i class="fa fa-copyright"></i> 2007 - 2018 Quiz Online</p>
	</footer>
</body>
</html>