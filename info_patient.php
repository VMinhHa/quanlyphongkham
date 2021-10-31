<?php
	include 'pages/header.php';
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Thông tin cá nhân</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">Thông tin cá nhân</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service-2">
	<div class="container">
		<div class="row">
			<?php 
				include './db/connect.php';
				$s=new data();
				$sql='select * from thuoc';
				$dsthuoc=$s->executeLesult($sql);
				foreach($dsthuoc as $value){
			?>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5">
						
						<div class="content">
							<h4 class="mt-4 mb-2 title-color"><?php echo $value['Tenthuoc'] ?></h4>
							<p><b>Loại thuốc: <?php echo $value['Loaithuoc'] ?></b></p>
							<p class="mb-4"><?php echo $value['Thongtinthuoc'] ?></p>
						</div>
					</div>
				</div>
			<?php
				}
			?>
		</div>
	</div>

	
</section>

<?php
	include 'pages/footer.php';
?>

  </body>
  </html>