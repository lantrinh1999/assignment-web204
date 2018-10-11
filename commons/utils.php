<?php 
// Database config
$host = "127.0.0.1";
$dbname = "web204";
$dbusername = "root";
$dbpwd = "";
$conn = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8",
    $dbusername,
    $dbpwd
);
// website base url
$siteUrl = 'http://localhost:81/web204/';
$adminUrl = 'http://localhost:81/web204/admin/';
$adminAssetUrl = 'http://localhost:81/web204/admin/adminlte/';



define('TABLE_CATEGORY', 'categories');
define('TABLE_SLIDESHOW', 'slideshows');
define('TABLE_PRODUCT', 'products');
define('TABLE_WEBSETTING', 'web_settings');
define('TABLE_COMMENT', 'comments');
define('TABLE_BRANDS', 'brands');


const USER_ROLES = [
	'admin' => 500,
	'moderator' => 300,
	'member' => 1
];


function dd($var){
	echo "<pre>";
	var_dump($var);
	die;
}

function checkLogin($role = 300){
	global $siteUrl;
	if(!isset($_SESSION['login']) 
		|| $_SESSION['login'] == null
		|| $_SESSION['login']['role'] < $role){
	  header('location: '.$siteUrl . 'login.php');
	  die;
	}
}

?>