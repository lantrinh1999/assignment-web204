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
</head>
<body>
    
    <?php 
    include './_share/header.php';
    ?>


<br>
<br>
<br>
  <!-- Page Content -->
  <div class="container">

    <div class="row">



      <div class="col-lg-9">


        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Giới thiệu
          </div>
          <div class="card-body">
            Vào ngày 16/3/1966, tại số 704 Broadway, Anaheim, California, Paul Van Doren và 2 người cộng sự đã khai
            trương cửa hàng
            đầu tiên và từ đó thương hiệu nổi tiếng Vans đã ra đời.
            <br>
            Công ty giày Van Doren Rubber độc đáo ở việc tự sản xuất và bán giày trực tiếp cho người tiêu dùng. Vào
            buổi sáng đầu
            tiên, 12 khách hàng đặt hàng và những đôi giày đó được làm ngay, hoàn tất đưa đến tay khách hàng trong buổi
            chiều cùng
            ngày. Đôi giày Vans #44 , còn được gọi là Authentic đã xuất hiện.
            <br>
            VANS chính thức gia nhập thị trường thời trang Việt Nam
            Các vận động viên Skateboard, những người thích sử dụng đôi giày Vans khỏe mạnh để tô điểm và giữ thăng
            bằng thật lâu.
            Với sự giúp đỡ của các vận động viên Skateboard và BMX Vans Slip-On đã trở thành cơn sốt tại miền Nam
            California.Vans
            được xem là cầu nối cho môn thể thao này ở toàn miền Nam California vào đầu những năm 1970.
            <br>
            VANS chính thức gia nhập thị trường thời trang Việt Nam
            Vào cuối những năm 1970, Vans đã có 70 cửa hàng tại California, đồng thời phân phối qua các đại lý trong cả
            nước cũng
            như toàn thế giới.
            <br>
            Đôi giày Vans Slip-On đã gây được ấn tượng và giành được sự chú ý của thế giới khi được Sean Penn mang vào
            năm 1982,
            trong bộ phim nói về thế hệ thanh thiếu niên lúc bấy giờ “ Fast Times at Ridgemont High.”
            <br>
            VANS chính thức gia nhập thị trường thời trang Việt Nam
            Vans bắt đầu sản xuất các sản phẩm giày dép ở nước ngoài từ năm 1994, song song với việc đó thì việc phát triển thêm các mẫu giày mang phong cách mới cũng được tiến hành. Vans tiên phong trong việc mở ra giải thi đấu các môn thể thao mạo hiểm với việc tài trợ cho giải Triple Crow của môn ván trượt, và sau đó giải đã được đổi tên thành Vans Triple Crown trong đó có sự tham gia của các môn trượt ván, BMX, lướt sóng, lướt ván, trượt tuyết và mô tô địa hình.
<br>
VANS chính thức gia nhập thị trường thời trang Việt Nam
Năm 2004 Vans ra mắt trang web www.vans.com, tại đây cho phép các nhà thiết kế tạo ra các sản phẩm mà họ thích trên nền đôi giày Classic Slip-on bằng việc sử dụng hàng trăm màu sắc kết hợp lại với nhau.
<br>
Vào năm 2006 Vans tổ chức lễ kỷ niệm 40 năm thành lập tại trung tâm văn hóa thanh niên….

Tháng 4/2011, Vans chính thức có mặt tại Việt Nam được phân phối bởi đại lý chính thức tại – Công ty TNHH TM-DV Vĩnh Quang Minh – với cửa hàng đầu tiên số 78 đường Nguyễn Trãi quận 1 thành phố Hồ Chí Minh

Một số hình ảnh về cửa hàng đầu tiên của Vans
<br>
VANS chính thức gia nhập thị trường thời trang Việt Nam
VANS chính thức gia nhập thị trường thời trang Việt Nam
Cửa hàng Vans đầu tiên sẽ là khởi đầu tốt đẹp cho hàng loạt các cửa hàng Vans sau này! Vans sẽ ngày càng phát triển để góp phần làm phong phú thêm cho thời trang Việt Nam. Hy vọng ngày càng nhận được sự quan tâm và ủng hộ của giới trẻ với đối với thương hiệu Vans!
<br>
VANS chính thức gia nhập thị trường thời trang Việt Nam
Các dòng sản phẩm tiêu biểu của Vans

          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->
      <div class="col-lg-3">
          <div class="card-title">
            Sản phẩm mới nhất
          </div>
<?php foreach ($newProducts as $np) : ?>
<br>
<div class="col-lg-12">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" width="60%" height="60%" src="<?= $siteUrl . $np['image'] ?>" alt=""></a>
    <div class="card-body">
      <p class="card-title text-center">
        <?= $np['product_name'] ?>
      </p>
      <div class="footer-product text-center view">
        <a href="<?= $siteUrl ?>chitiet.php?id=<?= $np['id'] ?>" class="btn btn-dark">Xem chi tiết</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
      </div>
      <!-- /.col-lg-3 -->
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




</body>
</html>