<?php 
	session_start();
	if(isset($_SESSION['email'])){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			header("location: store.php?page=$page");
		}else{
			header('location: store.php');
		}
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
    <?php include 'asset/css.php'?>
</head>
<body class="animsition">

	<!-- Header -->
	<?php 
		include 'asset/header.php';
		?>

	<!-- Slide1 -->
	
	<?php 
		error_reporting(0);
		if($_GET['page']==''){
			include 'asset/main.php';
		}
		if($_GET['page']=='sarung'){
			include 'content/sarung.php';
		}
		if($_GET['page']=='jilbab'){
			include 'content/jilbab.php';
		}
		if($_GET['page']=='atasan'){
			include 'content/atasan.php';
		}
		if($_GET['page']=='kain'){
			include 'content/kain.php';
		}
		if($_GET['page']=='daster'){
			include 'content/daster.php';
		}
		if($_GET['page']=='tentang'){
			include 'content/tentang.php';
		}
		if($_GET['page']=='bantuan'){
			include 'content/bantuan.php';
		}
		if($_GET['page']=='masuk'){
			include 'content/masuk.php';
		}
		if($_GET['page']=='daftar'){
			include 'content/daftar.php';
		}
		if($_GET['page']=='cart'){
            include 'content/cart.php';
		}
		if($_GET['page']=='cari'){
			include 'content/pencarian.php';
		}

	?>

	<!-- Iklan -->



	<!-- Shipping -->
	<?php include 'asset/shipping.php'?>


	<!-- Footer -->
    <?php include 'asset/footer.php'?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

<?php include 'asset/modal-user.php' //Mengimport Konfigurasi Modal/Popup User?>
<!-- import javascript dan JQuery -->
<?php include 'asset/js.php'?>

</body>
</html>
<?php } ?>