<?php
require_once './commons/utils.php';
$id = $_GET['id'];

$pro = "select * from " . TABLE_PRODUCT
    . " where id = $id";

$stmts = $conn->prepare($pro);
$stmts->execute();
$p = $stmts->fetch();

$commentSql = "select * from " . TABLE_COMMENT
    . " where product_id = $id order by id desc";

$stmt = $conn->prepare($commentSql);
$stmt->execute();
$comments = $stmt->fetchAll();

$sqlmoreproductlike = "select * from " . TABLE_PRODUCT . " where cate_id =" . $p['cate_id'] . " and id != " . $p['id'] . "  order by rand() limit 4";
$stmt = $conn->prepare($sqlmoreproductlike);
$stmt->execute();
$datamoreproductlike = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang=" en ">
<head>
	<?php
include './_share/client_assets.php';
?>
<link rel="stylesheet" href="css/main.css">
	<title>THÔNG TIN SẢN PHẨM</title>
</head>
<body>

    <?php
include './_share/header.php';
?>


<br>
<br>
<br>

<!-- san pham -->

<div class="container">
    <div class="row">
        <div class="col-md-4">
          <img class="img-fluid" src="<?=$siteUrl . $p['image']?>" alt="">
        </div>

        <div class="col-md-8">
          <h3 class="my-3"><?=$p['product_name']?></h3>
          <div class="text-left">
              	Giá bán: <a class="">
							<span class="list_price"><strike>
								<?=$p['list_price']?>Đ
							</strike></span>
							</a>
						<br>
						Giá khuyến mại:  <span class="sell_price"><a class=""><?=$p['sell_price']?>Đ</a></span>
          </div>
          <br>
          <p><?=$p['detail']?></p>
          <br>
          <button class="btn btn-dark">MUA</button>
          </div>


        </div>

</div>

<br>
<br>

<!-- san pham -->

	<div id="hot-product">
		<div class="container">
            <hr>
            <br>
            <h3>Phản hồi</h3>
			<div class="row">

                <br>
				<div class="col-md-6 border-right">
					<form onsubmit="return validateForm()" class="myForm" name="myForm" action="submit_comment.php" method="post">

						<input type="hidden" name="id" value=" <?=$id?>">
            <span id="err"></span>
						<div class="form-group">
							<label>Email</label>
							<input type="text" id="email" placeholder="email" name="email" class="form-control" >
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<textarea class="form-control" id="content" rows="5" placeholder="nội dung" name="content"></textarea>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-sm btn-primary">Gửi phản hồi</button>
						</div>




					</form>
				</div>
				<div class="col-md-6">
						<h3>Comment</h3>
                           <div style="max-height: 250px; overflow:scroll;width = 500px" class="box-cmt">
 <?php foreach ($comments as $cm):
?>
                            <div class="media">
                                <img class="mr-3" src="img/guest.png" width="64px" height="64px" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6 class="mt-0"><?=$cm['email']?></h6>
                                    <p style="margin-left: 16px">
                                        <?=$cm['content']?>
                                    </p>
                                </div>
                            </div>
                            <hr>
  <?php endforeach?>
						</div>
				</div>
			</div>
		</div>
	</div>





<br>
<br>

<?php
include './_share/more_product_like.php';
?>




  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->
<script>
function validateForm() {

    var x = document.forms["myForm"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Bạn phải nhập email") ;
        /*
        var a = document.getElementById('err').innerHTML = "lỗi" ;
        */
        return false;
    }
    if (x == "") {
      alert("Bạn phải nhập email") ;
     /* 
     var a = document.getElementById('err').innerHTML = "lỗi 1" ;
     */
        return false;
    }
    var y =  document.forms["myForm"]["content"].value;
    if (y == "") {
    	alert("Bạn phải nhập nội dung");
      /*
      var a = document.getElementById('err').innerHTML = "lỗi 2" ;
      */
        return false;
    }
}
</script>



</body>
</html>