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




$newBrandQuery = "select * from brands";
$stsm = $conn->prepare($newBrandQuery);
$stsm->execute();
$newBrand = $stsm->fetchAll();

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
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: 1,
              $AutoPlaySteps: 5,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 5
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>
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
						<a href="#" class="btn btn-dark">Mua hàng</a>
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
						<a href="#" class="btn btn-dark">Mua hàng</a>
					</div>
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>

  </div>

<div id="brand">
      <div class="container">
        <div class="row bg-white border border-top-primary">
          <div class="col-sm-12">
          </div>
          <div class="col-sm-12" style="padding-bottom: 50px;">
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:150px;overflow:hidden;visibility:hidden;">
              <!-- Loading Screen -->
              <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
              </div>
              <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">
                <br>
                <?php foreach ($newBrand as $key): ?>
                  <div>
                    <img data-u="image" src="<?= $siteUrl.$key['image'] ?>" />
                  </div>
                <?php endforeach ?>
                
              </div>
              <!-- Bullet Navigator -->
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>  



  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->


</body>

</html>