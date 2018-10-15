<?php 
session_start();


// hien thi danh sach danh muc cua he thong

$path = "../";
require_once $path.$path."commons/utils.php";

checkLogin();

// dem ton so record trong bang danh muc
$sql = "select 
			s.*
		from " . TABLE_WEBSETTING . " s";
$stmt = $conn->prepare($sql);
$stmt->execute();
$web_settings = $stmt->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Quản lý danh mục</title>

  <?php include_once $path.'_share/top_asset.php'; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once $path.'_share/header.php'; ?> 

  <?php include_once $path.'_share/sidebar.php'; ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Quản lý Thông tin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thông tin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tbody>
                	<tr>
	                  <th style="width: 10px">Id</th>
	                  <th style="width: 200px">Logo</th>
	                  <th style="width: 100px">Hot line</th>
	                  <th>Map</th>
	                  <th style="width: 140px">Email</th>
	                  <th style="width: 140px">Facebook</th>
	                  <th style="width: 50px;">
	                  </th>
	                </tr>
	                <?php foreach ($web_settings as $c): ?>
	                	
		                <tr>
		                  <td><?= $c['id']?></td>
		                  <td>
		                  	<img style="width: 100%" src="<?=$path . $path . $c['logo']?>">
		                  </td>
		                  <td>
		                    <?= $c['hotline']?>
		                  </td>
		                  <td><?= $c['map']?></td>
		                  <td><?= $c['email']?></td>
		                  <td><?= $c['fb']?></td>
		                  <td>
		                  	<a href="<?= $adminUrl?>thong-tin/edit.php?id=<?= $c['id']?>"
                  			class="btn btn-xs btn-info"
	                  		>
	                  			<i class="fa fa-pencil"></i> Sửa
	                  		</a>
		                  	
		                  </td>
		                </tr>
	                <?php endforeach ?>
	              </tbody>
	          	  </table>
	            </div>
	            <!-- /.box-body -->
	            
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'_share/sidebar.php'; ?>  

</div>
<!-- ./wrapper -->
<?php include_once $path.'_share/bottom_asset.php'; ?>  

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
	<?php 
	if(isset($_GET['success']) && $_GET['success'] == 'true'){
		?>
		swal('Thêm danh mục thành công!');
	<?php
	}
	 ?>
	$('.btn-remove').on('click', function(){

		var removeUrl = $(this).attr('linkurl');
		// var conf = confirm('Bạn có chắc chắn muốn xoá danh mục này không?');
		// if(conf){
		// 	window.location.href = removeUrl;
		// }
		swal({
		  title: "Cảnh báo",
		  text: "Bạn có chắc chắn muốn xoá danh mục này không?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		    window.location.href = removeUrl;
		  } 
		});
	});

</script>

</body>
</html>
