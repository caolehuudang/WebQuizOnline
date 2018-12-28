<?php
require_once('Config/db.php');?>
<?php
        if(isset($_POST['submit'])){
            $subject = $_POST['subject'];
            $description = $_POST['description'];
            if($subject == '' || $description ==''){
                //header('Location: subjectAdmin.php');
                ?>
                <script>
                      window.alert("Nhập đủ thông tin");
                      window.location("subjectAdmin.php");
                </script>
                <?php
                header('Location: subjectAdmin.php');
            }else{
                $sql = "INSERT INTO subject(subject_name, description) VALUES ('$subject','$description')";
                mysqli_query($conn, $sql);
                ?>
                <script>
                      window.alert("thêm thành công");
                      window.location("subjectAdmin.php");
                </script>
                <?php
                 header('Location: subjectAdmin.php');
            }
        }
?>