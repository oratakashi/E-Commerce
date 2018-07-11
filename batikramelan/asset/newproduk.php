<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					PRODUK UNGGULAN
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php
						require_once ('koneksi.php');
						$connection = new ConnectionDB();
						$conn = $connection -> getConnection();
						$lokasi = $_GET['page'];
						$sql = "SELECT * from tb_produk where id_kategori != '1'";
						$query = $conn->prepare($sql);
						$query->execute();
						foreach($query as $data){
							$id_produk = $data['id_produk'];
							$sql = "SELECT * FROM tb_foto where id_produk='$id_produk'";
							$result = $conn->prepare($sql);
							$result->execute();
							foreach($result as $foto){}
					?>
					<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative ">
									<img src="../media/foto/<?= $foto['nama_foto'] ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="aksi/addcart.php?sumber=store.php?page=<?= $lokasi ?>&src=produk&id=<?= $data['id_produk'] ?>"><button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" style="font-size:11px">
											Tambah Ke Keranjang
										</button></a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="detailproduk.php?id=<?= $data['id_produk']?>" class="block2-name dis-block s-text3 p-b-5">
										<?= $data['nama_produk'] ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										<?= "Rp. ".number_format($data['harga_produk'], 2, ',','.') ?>
									</span>
								</div>
							</div>
					</div>
					<?php } ?>
					
				</div>
			</div>

		</div>
</section>
