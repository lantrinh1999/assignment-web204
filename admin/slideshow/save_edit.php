<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'slideshow');
	die;
}
$slideshowId = $_POST['id'];
$sql = "select * from slideshows where id = '$slideshowId'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$slideshow = $stmt->fetch();

$url = $_POST['url'];
$status = $_POST['status'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'img/slider/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);
if ($img['name'] == "") {
	$filename = $image;
}

$sql = "UPDATE slideshows SET url=:url,status=:status,image=:image WHERE id = '$slideshowId'";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":url", $url);
$stmt->bindParam(":status", $status);
$stmt->bindParam(":image", $filename);
$stmt->execute();

header('location: ' . $adminUrl . 'slideshow');
 ?>