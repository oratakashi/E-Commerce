<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<?php 
						require_once ('koneksi.php');
						$connection = new ConnectionDB();
						$conn = $connection -> getConnection();
						$id_produk = $_GET['id'];
						$sql = "SELECT * from tb_produk where id_produk = '$id_produk'";
						$query = $conn->prepare($sql);
						$query->execute();
						foreach($query as $data){} 
						$sql = "SELECT * FROM tb_foto where id_produk='$id_produk'";
						$result = $conn->prepare($sql);
						$result->execute();
						foreach($result as $foto){}
						$id_kategori = $data['id_kategori'];
						$sql = "SELECT * FROM tb_kategori where id_kategori='$id_kategori'";
						$result = $conn->prepare($sql);
						$result->execute();
						foreach($result as $kat){}
					?>
					<div class="slick3">
						<div class="item-slick3" data-thumb="../media/foto/<?= $foto['nama_foto'] ?>">
							<div class="wrap-pic-w">
								<img src="../media/foto/<?= $foto['nama_foto'] ?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $data['nama_produk'] ?>
				</h4>

				<span class="m-text17">
				<?= "Rp. ".number_format($data['harga_produk'], 2, ',','.') ?>
				</span>

				<p class="s-text8 p-t-10">
					Stok : <?= $data['jumlah_produk'] ?>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							
								
							<form action="aksi/addcart.php?src=detail" method="post" class="flex-w">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>
								<input class="size8 m-text18 t-center num-product" type="number" name="jumlah" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
								<input type="text" name="id" value="<?php echo $_GET['id'] ?>"  hidden>
								<input type="submit" value="Tambah ke Keranjang" class="btn btn-success" style="margin-left:25px">
							</form>
							

							
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Kode Barang: <?=$data['id_kategori']?> - <?= $data['id_produk'] ?></span>
					<span class="s-text8">Kategori: <?= $kat['nama_kategori'] ?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Deskripsi Produk
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= $data['deskripsi']?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Produk Terkait
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				<?php
					$id_kategori = $data['id_kategori'];
					$sql = "SELECT * from tb_produk where id_kategori = '$id_kategori' LIMIT 0, 4";
					$query = $conn->prepare($sql);
					$query->execute();
					foreach($query as $saran){
						$id_produk=$saran['id_produk'];
						$sql = "SELECT * FROM tb_foto where id_produk='$id_produk'";
						$result = $conn->prepare($sql);
						$result->execute();
						foreach($result as $foto){}
				?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="../media/foto/<?= $foto['nama_foto'] ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a href="aksi/addcart.php?sumber=detailproduk.php?id=<?= $data['id_produk'] ?>&src=produk&id=<?= $data['id_produk'] ?>"><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" style="font-size:11px">
											Tambah Ke Keranjang
										</button></a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="detailproduk.php?id=<?= $saran['id_produk']?>" class="block2-name dis-block s-text3 p-b-5">
									<?= $saran['nama_produk'] ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
								<?= "Rp. ".number_format($saran['harga_produk'], 2, ',','.') ?>
								</span>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>

		</div>
	</section>