<?php 
require_once './commons/utils.php';

$sql = "select * from " . TABLE_WEBSETTING;
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetch();

// var_dump($data);
$sqlCates = "select * from " . TABLE_CATEGORY;

$stmt = $conn->prepare($sqlCates);
$stmt->execute();

$dataCate = $stmt->fetchAll();


?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">
          <img src="<?= $siteUrl . $data['logo'] ?>" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="text-xl-right navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= $siteUrl ?>">Trang chủ<span class="sr-only">(current)</span></a>
          </li>
          
          
					<!-- Danh sach danh muc -->
					<?php foreach ($dataCate as $c) : ?>
						<li class="nav-item">
							<a class="nav-link" href="danhmuc.php?id=<?= $c['id'] ?>"><?= $c['name'] ?></a>
						</li>
          <?php endforeach ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= $siteUrl ?>gioithieu.php">Giới thiệu</a>
          </li>
						<li class="nav-item">
							<a class="nav-link" href="<?= $siteUrl ?>lienhe.php">Liên hệ</a>
						</li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $siteUrl ?>logout.php">Đăng nhập</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="nav-item form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
          <button class="nav-item btn  my-2 my-sm-0 btn-search" type="submit">Tìm</button>
        </form>
      </div>
    </div>
  </nav>

  