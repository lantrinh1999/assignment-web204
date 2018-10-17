<?php
// // tao ket noi den csdl
require_once './commons/utils.php';

// echo "<pre>";
// var_dump($dataCate);
//
// var_dump($dataSlides);
// lay du lieu tu csdl bang products cho sp moi
$newProductsQuery = "	select *
						from " . TABLE_PRODUCT . "
						order by id desc
						limit 6";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();

$newProducts = $stmt->fetchAll();

// lay du lieu tu csdl bang products cho sp xem nhieu nhat
$mostViewsQuery = "	select *
						from " . TABLE_PRODUCT . "
						order by views desc
						limit 6";
$stmt = $conn->prepare($mostViewsQuery);
$stmt->execute();

$mostViewsProducts = $stmt->fetchAll();

$brandsQuery = "	select *
						from " . TABLE_BRANDS . "
						order by id ";
$stmt = $conn->prepare($brandsQuery);
$stmt->execute();

$brands = $stmt->fetchAll();

?>


<!DOCTYPE html>
  <html lang = "en">

  <head>
    <?php
include './_share/client_assets.php';
?>
  <title> SHOP </title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </head>

<body>
  <!-- Navigation -->
  <!-- Navigation -->
<?php
include './_share/header.php';
?>
<!-- Navigation -->
<!-- Navigation -->



  <!-- Page Content -->
  <div class="container">
    <!-- slider -->
    <?php
include './_share/slider.php';
?>
    <!-- slider -->



       <hr>
   <br>


<div class="tittle-product">
				<h3>Sản phẩm mới</h3>
			</div>
    <!-- /.row -->
    <div class="row">
      <?php foreach ($newProducts as $np): ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="<?=$siteUrl?>chitiet.php?id=<?=$np['id']?>"><img class="card-img-top" src="<?=$siteUrl . $np['image']?>" alt=""></a>
          <div class="card-body">
            <p class="card-title text-center">
              <?=$np['product_name']?>
</p>
            <div class="text-left">
						Giá bán: <a class="">
							<span class="list_price"><strike>
								<?=$np['list_price']?>Đ
							</strike></span>
							</a>
						<br>
						Giá khuyến mại:  <span class="sell_price"><a class=""><?=$np['sell_price']?>Đ</a></span>
          </div>
          <br>
          <div class="footer-product text-center view">
            <a href="<?=$siteUrl?>chitiet.php?id=<?=$np['id']?>" class="btn btn-dark">Xem chi tiết</a>
            <span></span>
            <!--
						<a href="#" class="btn btn-dark">Mua hàng</a>
              -->
					</div>
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>
     <hr>
   <br>


<div class="tittle-product">
				<h3>Sản bán chạy</h3>
			</div>
    <!-- /.row -->
    <div class="row">
      <?php foreach ($mostViewsProducts as $np): ?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="<?=$siteUrl?>chitiet.php?id=<?=$np['id']?>"><img class="card-img-top" src="<?=$siteUrl . $np['image']?>" alt=""></a>
          <div class="card-body">
            <p class="card-title text-center">
              <?=$np['product_name']?>
</p>
            <div class="text-left">
						Giá bán: <a class="">
							<span class="list_price"><strike>
								<?=$np['list_price']?>Đ
							</strike></span>
							</a>
						<br>
						Giá khuyến mại:  <span class="sell_price"><a class=""><?=$np['sell_price']?>Đ</a></span>
          </div>
          <br>
          <div class="footer-product text-center view">
            <a href="<?=$siteUrl?>chitiet.php?id=<?=$np['id']?>" class="btn btn-dark">Xem chi tiết</a>
            <span></span>

					</div>
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>

  </div>


  <div>
    <div class="container text-center">
      <h2></h2>
      <?php
foreach ($brands as $br):
?>
      <img  src="<?=$siteUrl . $br['image']?> ?>" alt="">
      <?php endforeach?>
    </div>
  </div>
  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->


</body>

</html>