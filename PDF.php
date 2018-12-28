
<?php 
 header('Content-type: text/html; charset=UTF-8') ;
require_once('Config/db.php');
$mon= $_GET['id_subject'];

// if($_GET['id_subject']){
//     $sql2=mysqli_query($conn,"select * from $questions where id_subject = $mon");
//     // $name=mysqli_query($conn,"select subject_name from $subject where id_subject = $mon  ");
//     // $result1 = mysqli_fetch_array($name);
            
// }
//    
?>


<?php 
require 'vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf = new DOMPDF(); 
$dompdf->set_paper(array(0,0,700,1200));


require_once('Config/db.php');
$mon= $_GET['id_subject'];

if($_GET['id_subject']){
        $sql2=mysqli_query($conn,"select * from $questions where id_subject = $mon");
         $name=mysqli_query($conn,"select subject_name from $subject where id_subject = $mon  ");
         $result1 = mysqli_fetch_array($name);
                
}
$out = '
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
body { font-family: DejaVu Sans, sans-serif;
   font-size:14px;
}

</style>
</head>
<h2 style ="text-align:center">Môn Thi '.$result1['subject_name'].'</h2>
<h3>Họ tên: .............................................</h3>
';


    $count = 0;
    while ($result = mysqli_fetch_array($sql2)) {
        $count++;
       $out .= '
        
            <span>Câu'.$count.':<span>
            <span>' . $result["name"]. '</span>
            <br/>
            <span> A.'.$result["ans1"] .'</span> 
            <br/>
            <span> B.'.$result["ans2"] .'</span> 
            <br/>
            <span> C.'.$result["ans3"] .'</span> 
            <br/>
            <span> D.'.$result["ans4"] .'</span> 
            <br/><br/>
           
            
   ';
   
}

 //if you use namespaces you may use new \DOMPDF()

$dompdf->loadHtml($out,'UTF-8');

$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));


?>