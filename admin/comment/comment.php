<?php 
// hien thi danh sach danh muc cua he thong
$path = "../";
require_once $path.$path."commons/utils.php";
// dem ton so record trong bang danh muc
$sql = "select 
      cmt.*,
      p.product_name
    from " . TABLE_COMMENT . " cmt
    join " . TABLE_PRODUCT . " p
      on cmt.product_id = p.id
    group by cmt.id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$comment = $stmt->fetchAll();
 //dd($products);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE | Quản lý danh mục</title>

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
        <small>Quản lý danh mục</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh mục</li>
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
                    <th style="width: 120px">Tên sản phẩm</th>
                    <th style="width: 110px">Email</th>
                    <th style="width: 120px">Nội dung</th>
                    <th style="width: 135px;">
                      <a href="<?= $adminUrl?>comment/add.php"
                        class="btn btn-xs btn-success"
                        >
                        <i class="fa fa-plus"></i> Thêm mới
                      </a>
                    </th>
                  </tr>
                  <?php foreach ($comment as $cmt): ?>
                    
                    <tr>
                      <td><?= $cmt['id']?></td>
                      <td><?= $cmt['product_name']?></td>
                      <td>
                        <?= $cmt['email']?>
                      </td>
                      
                      <td>
                        <?= $cmt['content'] ?>
                      </td>
                      <td>
                        <a href="<?= $adminUrl?>danh-muc/edit.php?id=<?= $c['id']?>"
                        class="btn btn-xs btn-info"
                        >
                          <i class="fa fa-pencil"></i> Cập nhật
                        </a>
                        <a href="<?= $adminUrl?>danh-muc/remove.php?id=<?= $c['id']?>"
                        class="btn btn-xs btn-danger"
                        >
                          <i class="fa fa-trash"></i> Xoá
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
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

</body>
</html>
