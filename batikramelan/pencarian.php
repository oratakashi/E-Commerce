<?php
	session_start();
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
        if(isset($_SESSION['email'])){
            include 'asset/header_user.php';
        }else{
            include 'asset/header.php';
        }
	?>

	<!-- Slide1 -->
	
	<?php 
		error_reporting(0);
		include 'content/pencarian.php';
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


<!-- import javascript dan JQuery -->
<?php include 'asset/js.php'?>

</body>
</html>
