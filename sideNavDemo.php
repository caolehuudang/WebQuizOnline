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
    
body {
    overflow-x: hidden;
 }


#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.6s ease;
    -moz-transition: all 0.6s ease;
    -o-transition: all 0.6s ease;
    transition: all 0.7s ease;
    
}

#wrapper.toggled {
    padding-left: 200px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background-color: #222222 !Important;
   
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 0;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 10px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-left:-250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    right:15px;
    width: 200px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: #222222;
    font-size:15px;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 220px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 200px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 40px;
        
        
    }

#wrapper.toggled span {
        visibility:hidden;
        
    }
  #wrapper.toggled   i {
 float:right;
 } 

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}


@media(max-width:414px) {

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right:60px;
}

#wrapper.toggled {
    padding-right: 60px;
}

 #wrapper {
        padding-left: 20px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 50px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 140px;
        
        
    }
    
    #wrapper.toggled span {
        visibility:visible;
        position:relative;
        left:70px;
        bottom:13px;
        
    }

#wrapper span {
        visibility:hidden;
        
    }
  #wrapper.toggled   i {
 float:right;
 } 
 
  #wrapper   i {
 float:right;
 } 

    #page-content-wrapper {
        padding: 5px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}
            
            


.profile-header-img > img.img-circle {
    width: 70px;
    height: 70px;
    border: 2px solid #51D2B7;
}
.profile-header-text{
    color:peru;
    text-align:center;
    text-decoration: none;
}

.profile-header {
    margin-top: -100px;
}
.menu{
    text-align:center;
}




.toggle input[type="radio"] + .label-text:before{
	content: "\f204";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
	content: "\f205";
	color: #16a085;
	animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
	content: "\f204";
	color: #ccc;
}
label{
	position: relative;
	cursor: pointer;
	color: #666;
	font-size: 30px;
}

input[type="checkbox"], input[type="radio"]{
	position: absolute;
	right: 9000px;
}

@keyframes effect{
	0%{transform: scale(0);}
	25%{transform: scale(1.3);}
	75%{transform: scale(1.4);}
	100%{transform: scale(1);}
}

</style>
<body>
<?php require_once('NavBar.php');?>
<div class="container">
	<div class="row">
		
		<hr/>
		 <div id="wrapper">
       
        <div id="sidebar-wrapper">
            
    <ul class="sidebar-nav" style="margin-left:0;">
            <li class="sidebar-brand">
                <a href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" >
                <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> 
            </li>
               
                
              
    <ul class="profile-header-container ">   
    	<span class="profile-header-img">
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
        </span>
        <span class="profile-header-text">
             <?php
              if(isset($_SESSION['id_member'])){
                $id_member =  $_SESSION['id_member'];
                    $sql1 = mysqli_query($conn,"select *from member WHERE  id_member = '$id_member'");
                    while ($result1 = mysqli_fetch_array($sql1)) {
                        ?> 
                            <p> <?= $result1['name'] ?></p>
                        <?php
                    }
                }
            ?>
          <span style="font-size:12px"><i style="font-size:12px" class="fa fa-circle text-success"></i> Online</span>
        </span>
    </ul>
    <?php 
             $sql2 = mysqli_query($conn,"select count(*) as tmp from exam_registration");
             $count = mysqli_fetch_array($sql2);

             $sql3 = mysqli_query($conn,"select  count(status) as tmp from chat where status = 1");
             $count_chat = mysqli_fetch_array($sql3);
    ?>
    <br/><br/><br/>
        <li><a class="menu" href="admin.php">Thống Kê</a></li>
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

        <li class="sidebar-brand">
            <a href="#" data-toggle="modal" data-target="#myTheme" style="margin-bottom:10px;float:right;" >
            <i class="fa fa-cogs " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i> 
        </li>
    </ul>
 
</div>
</a>
<div id="myTheme" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style = "color:peru">Thay đổi Theme</h4>
      </div>
      <div class="modal-body">
        <form id="myForm">
				<div class="form-check">
					<label class="toggle">
						<input id="ra0" type="radio" name="theme" value = "0" > <span class="label-text">Dark</span>
					</label>
				</div>
				<div class="form-check">
					<label class="toggle">
						<input id = "ra1"type="radio" name="theme" value = "1"> <span class="label-text">Light</span>
					</label>
				</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $( document ).ready(function() {
    $('#myForm input').on('change', function() {
        var tmp = $('input[name=theme]:checked', '#myForm').val(); 
        localStorage.setItem("theme", tmp);
        var xxx =localStorage.getItem("theme");
        if(xxx === "1"){
            $("body").removeClass("changeTheme");
        }
        else if(xxx = "0"){
            $("body").addClass("changeTheme");
        }
    });
    });
    $( document ).ready(function() {
        var xxx =localStorage.getItem("theme");
        if(xxx === "1"){
            $("body").removeClass("changeTheme");
            document.getElementById("ra1").checked = true;
        }
        else if(xxx = "0"){
            $("body").addClass("changeTheme");
            document.getElementById("ra0").checked = true;
            
        }
    });


    </script>   
    
</body>
</html>