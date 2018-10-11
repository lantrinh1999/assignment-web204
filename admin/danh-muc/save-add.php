<?php 
session_start();


require_once '../../commons/utils.php';

checkLogin();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'danh-muc');
	die;
}
$name = $_POST['name'];
$description = $_POST['description'];

if(!$name){
	header('location: ' . $adminUrl . 'danh-muc/add.php?errName=Vui lòng nhập tên danh mục');
	die;
}

$sql = "insert into " . TABLE_CATEGORY . " 
		(name, description)
		values
			(:name, :description)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);
$stmt->bindParam(":description", $description, PDO::PARAM_STR);

$stmt->execute();
header('location: ' . $adminUrl . 'danh-muc?success=true');

 ?>