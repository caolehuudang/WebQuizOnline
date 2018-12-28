
 <?php
require_once('./css/style.css');
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
$refuri = parse_url($_SERVER['HTTP_REFERER']); 
if($refuri['host'] == "localhost"){
echo "You should email me and tell me I have a dead link on this site.";
}
else{
echo "You should email someone over at " . $refuri['host'] . " and let them know they have a dead link to this site.";
}
}
else{
echo "<h1>PAGE NOT FOUND</h1> <a href='/home.php'>Về Trang Chủ </a> ";
echo '
<div id="notfound">
<div className="notfound">
    <div className="notfound-404">
        <h1>404</h1>
        <h2>Page Not Found</h2>
    </div>
    <Link to="/">Homepage</Link>
</div>
</div>';
}
 ?>

