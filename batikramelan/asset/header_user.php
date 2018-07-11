<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				
			

				<div class="topbar-child2">
					<span class="topbar" style="font-size:14px; color:grey">
						<?= "Login Sebagai : ".$_SESSION['nama'] ?>
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="store.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO" style="width:200px">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li class="<?php if($_GET['page']=='sarung'){echo 'sale-noti';} ?>">
								<a href="store.php?page=sarung">Sarung</a>
							</li>

							<li class="<?php if($_GET['page']=='atasan'){echo 'sale-noti';} ?>">
								<a href="store.php?page=atasan">Atasan</a>
							</li>

							<li class="<?php if($_GET['page']=='jilbab'){echo 'sale-noti';} ?>">
								<a href="store.php?page=jilbab">Jilbab</a>
							</li>

							<li class="<?php if($_GET['page']=='daster'){echo 'sale-noti';} ?>">
								<a href="store.php?page=daster">Daster</a>
							</li>

							<li class="<?php if($_GET['page']=='kain'){echo 'sale-noti';} ?>">
								<a href="store.php?page=kain">Kain</a>
							</li>

						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="user.php" class="header-wrapicon1 dis-block">
						Pesananku
					</a>
					<span class="linedivide1"></span>
					<a href="aksi/hapus.php" class="header-wrapicon1 dis-block">
						Logout
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<a href="store.php?page=cart"><i class="fa fa-shopping-cart js-show-header-dropdown"style="color:blue"></i></a>
						<span class="header-icons-noti">
							<?php
								if(empty($_SESSION['sesi'])){
									echo '0';
								}else{
									$id = $_SESSION['sesi'];
									require_once 'koneksi.php';
									$connection = new ConnectionDB();
									$conn = $connection->getConnection();
									$sql = "SELECT count(*) from tmp_detailcart where id_cart = '$id'";
									$query = $conn->prepare($sql);
									$query->execute();
									foreach($query as $data){}
									$hasil = $data[0];
									echo $hasil;
								}
							?>
						</span>

						<!-- Header cart noti -->

					</div>
				</div>
			</div>
			<div class"col-md-12">
			<form action="pencarian.php" method='get'>
				<input type="text" name="cari" id="" class="form-control" placeholder="&#xF002; Pencarian" style="font-family:Arial, FontAwesome;text-align: center;">
				<input type="submit" value="Cari" hidden>
			</form>
		</div>
		</div>
		
	</header>