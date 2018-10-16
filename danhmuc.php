<?php 
require_once './commons/utils.php';
$id = $_GET['id'];

// 1. Kiem tra xem id danh muc co thuc su ton tai khong
$sql = "select 
				c.*,
				(select count(*) from products where cate_id = $id) as total_product
		from " . TABLE_CATEGORY . " c
		where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if (!$cate) {
  header("location: $siteUrl" . "index.php");
  die;
}

$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 3;
$offset = ($pageNumber - 1) * $pageSize;

// 2. lay danh sach san pham thuoc danh muc
$sql = "select * from " . TABLE_PRODUCT
  . " where cate_id = $id limit $offset, $pageSize";

$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
include './_share/client_assets.php';
?>

	<title>Danh mục <?= $cate['name'] ?></title>
  <link rel="stylesheet" type="text/css" href="plugins/simplePagination/simplePagination.css">
  <script src="plugins/simplePagination/jquery.simplePagination.js" type="text/javascript"></script>
</head>
<body>
    <?php 
    include './_share/header.php';
    ?>


<br>
<br>
<br>
<div class="container">

    
      <div class="tittle-cate">
				<h3><?= $cate['name'] ?></h3>
			</div>
    <!-- /.row -->
    <div class="row">
      <?php foreach ($products as $np) : ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="<?= $siteUrl . $np['image'] ?>" alt=""></a>
          <div class="card-body">
            <p class="card-title text-center"><?= $np['product_name'] ?></p>
            <div class="text-left">
						Giá bán: <a class="">
							<span class="list_price"><strike>
								<?= $np['list_price'] ?>Đ
							</strike></span>
							</a>
						<br>
						Giá khuyến mại:  <span class="sell_price"><a class=""><?= $np['sell_price'] ?>Đ</a></span>
          </div>
          <br>
          <div class="footer-product text-center view">
            <a href="<?= $siteUrl ?>chitiet.php?id=<?= $np['id'] ?>" class="details btn btn-dark">Xem chi tiết</a>
            <span></span>
						<a href="<?= $siteUrl ?>chitiet.php?id=<?= $np['id'] ?>" class="buying btn btn-dark">Mua hàng</a>
					</div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <!-- phan trang -->
      <div class="row">
        <div class="paginate"></div>
      </div>
    <!-- phan trang -->
</div>
<br>

  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->
<script type="text/javascript">
	 	var pageUrl = '<?= $siteUrl . "danhmuc.php?id=" . $id ?>';
	 	$('.paginate').pagination({
	        items: <?= $cate['total_product'] ?>,
	        currentPage: <?= $pageNumber ?>, 
	        itemsOnPage: <?= $pageSize ?>,
	        cssStyle: 'light-theme',
	        onPageClick: function(val){
	        	window.location.href = pageUrl+`&page=${val}`;
	        }
	    });
</script>



</body>
</html>