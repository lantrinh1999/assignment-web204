<?php
require_once './commons/utils.php';
$newProductsQuery = "	select *
						from " . TABLE_PRODUCT . "
						order by id desc
						limit 3";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();

$newProducts = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang=" en ">
<head>
	<?php
include './_share/client_assets.php';
?>
<link rel="stylesheet" href="css/main.css">
	<title>THÔNG TIN SẢN PHẨM</title>
  <style type="text/css">
    .lienhe input{
      width: 60%;
    }
    .lienhe textarea{
      width: 60%
    }
  </style>
</head>
<body>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

    <?php
include './_share/header.php';
?>


<br>
<br>
<br>
  <!-- Page Content -->
 <div id="content">
        <div class="container">
            <h2 class="title-product">Liên hệ với chúng tôi</h2>
<div class="row">
                <div class="col-lg-8">
                <form onsubmit="return validateForm()" action="<?= $adminUrl ?>lien-he/save-add.php" class="myForm" name="myForm" method="post">

            <input type="hidden" name="id" value=" <?=$id?>">
            <div class="form-group">
              <label>Tên</label>
              <input type="text" id="name" placeholder="tên" name="name" class="form-control" >
            </div>
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
            <div class="col-lg-4">
<div class="fb-page" data-href="https://www.facebook.com/freevscocam/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/freevscocam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/freevscocam/">VSCO Free</a></blockquote></div>
            </div>
</div>
        </div>

</div>
  <!-- /.container -->


  <!-- Footer -->
  <!-- Footer -->
<?php
include './_share/footer.php';
?>
<!-- Footer -->
<!-- Footer -->
<script>
function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    if (name === "") {
      alert("Bạn phải nhập tên") ;
        return false;
    }
    var x = document.forms["myForm"]["email"].value;
    if (x === "") {
      alert("Email không được bỏ trống") ;
        return false;
    }
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Bạn phải nhập email đúng định dạng") ;
        return false;
    }
    var y =  document.forms["myForm"]["content"].value;
    if (y === "") {
      alert("Bạn phải nhập nội dung");
        return false;
    }
}
</script>


</body>
</html>