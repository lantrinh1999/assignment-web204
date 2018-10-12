<?php 
session_start();


require_once '../../commons/utils.php';

checkLogin();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'thong-tin/info.php');
	die;
}
$id = $_POST['id'];
$old_filename = $_POST['old_filename'];
$hotline = $_POST['hotline'];
$map = $_POST['map'];
$email = $_POST['email'];
$fb = $_POST['fb'];
$email = $_POST['email'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'img/products/'.uniqid() . '.' . $ext;

move_uploaded_file($img['tmp_name'], '../../'.$filename);



if ($img['name'] === "" || $img['size'] === 0 ) {
	$filename = $old_filename;
}
$imageFileType = strtolower($ext);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$filename = $old_filename;
	
}
    	$sql = "update " . TABLE_WEBSETTING . " 
			set
				hotline = :hotline, 
				email = :email,
				fb = :fb,
				logo = :image,
				map = :map";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->bindParam(":hotline", $hotline);
	$stmt->bindParam(":email", $email);
	$stmt->bindParam(":fb", $fb);
	$stmt->bindParam(":sell_price", $sell_price);
	$stmt->bindParam(":image", $filename);
	$stmt->bindParam(":map", $map);

	$stmt->execute();


$stmt->execute();
if(!$hotline){
	header('location: ' . $adminUrl . 'thong-tin/edit-info.php?errName=');
	die;
}
header('location: ' . $adminUrl . 'thong-tin/info.php');




 ?>