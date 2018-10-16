<?php 
session_start();
require_once '../../commons/utils.php';
checkLogin(USER_ROLES['admin']);
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: ' . $adminUrl . 'tai-khoan');
	die;
}
$sql = "select *, (SELECT COUNT(id) FROM users) as totalUser from users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$us = $stmt->fetchAll();
//dd($us);

$email = $_POST['email'];
$fullname = $_POST['fullname'];
$password = $_POST['password'];
$cfPassword = $_POST['cfPassword'];
$role = $_POST['role'];

foreach ($us as $u) {
	if ($email == $u['email']) {
		header('location: ' . $adminUrl . 'tai-khoan/add.php?msg2=Email đã được sử dụng!');
	die;
	}

	}
if($password != $cfPassword){
	header('location: ' . $adminUrl . 'tai-khoan/add.php?msg=Xác nhận mật khẩu không đúng!');
	die;
}
if($password == "" && $cfPassword == ""){
	header('location: ' . $adminUrl . 'tai-khoan/add.php?msg=Mật khẩu không được để trống!');
	die;
}


// email xem có tồn tại không

// mật khẩu có nằm trong khoảng từ 6-20 ký tự không


$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into users
			(email, 
			fullname, 
			password, 
			role)
		values 
			(:email, 
			:fullname, 
			:password, 
			:role)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":fullname", $fullname);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":role", $role);
$stmt->execute();
header('location: ' . $adminUrl . 'tai-khoan');

 ?>