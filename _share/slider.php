<?php 
require_once './commons/utils.php';

$sqlSlides = "select * from " . TABLE_SLIDESHOW . "
				where status = 1 
				 order by order_number";

$stmt = $conn->prepare($sqlSlides);
$stmt->execute();

$dataSlides = $stmt->fetchAll();

?>


<div class="row  slider">
      <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php 
            for ($i = 0; $i < count($dataSlides); $i++) {
              $act = $i == 0 ? "active" : "";
              ?>					
					<li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $act ?>"></li>
				<?php 
  } ?>
          </ol>
          <div class="carousel-inner" role="listbox">
				<?php 
    $count = 0;
    ?>
				<?php foreach ($dataSlides as $slide) : ?>
					<?php
    $active = $count === 0 ? "active" : "";
    ?>
					<div class="carousel-item <?= $active ?>">
						<img class="d-block img-fluid" src="<?= $siteUrl . $slide['image'] ?>">
					</div>
					<?php 
    $count++;
    ?>
				<?php endforeach ?>
				            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>


    </div>