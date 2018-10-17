<?php 
session_start();


require_once '../../commons/utils.php';

checkLogin();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'thong-tin/index.php');
	die;
}
$id = $_POST['id'];
$old_filename = $_POST['old_filename'];
$hotline = $_POST['hotline'];
$map = $_POST['map'];
$fb = $_POST['fb'];
$email = $_POST['email'];
$img = $_FILES['image'];
$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = 'img/'.uniqid() . '.' . $ext;
move_uploaded_file($img['tmp_name'], '../../'.$filename);


$sql = "update web_settings set hotline = :hotline, map = :map, email = :email, fb = :fb ";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":hotline", $hotline);
$stmt->bindParam(":map", $map);
$stmt->bindParam(":fb", $fb);
$stmt->bindParam(":email", $email);

$stmt->bindParam(":id", $id);
$stmt->execute();







header('location: ' . $adminUrl . 'thong-tin/index.php');




 ?>