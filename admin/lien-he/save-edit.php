<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin(USER_ROLES['admin']);
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'tai-khoan');
	die;
}

$id = $_POST['id'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = $_POST['password'];
$cfPassword = $_POST['cfPassword'];
$role = $_POST['role'];



if($password != $cfPassword){
	header('location: ' . $adminUrl . 'tai-khoan/edit.php?msg=Xác nhận mật khẩu không đúng!');
	die;
}


// email xem có tồn tại không

// mật khẩu có nằm trong khoảng từ 6-20 ký tự không


$password = password_hash($password, PASSWORD_DEFAULT);



$sql = "update users
			set
				email = :email, 
				fullname = :fullname,
				password = :password,
				role = :role
			where id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(":email", $email);
$stmt->bindParam(":fullname", $fullname);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":role", $role);
$stmt->bindParam(":id", $id);
$stmt->execute();
header('location: ' . $adminUrl . 'tai-khoan');

 ?>