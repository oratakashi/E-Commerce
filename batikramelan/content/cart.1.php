	

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100 ">
		<div class="container">
			<?php 
				session_start();
				require_once ('koneksi.php');
				$id = $_SESSION['sesi'];
				$connection = new ConnectionDB();
				$conn = $connection -> getConnection();
				
				$sql = "SELECT count(*) from tmp_detailcart where id_cart = '$id'";
				$query = $conn->prepare($sql);
				$query->execute();
				foreach($query as $output){}
				$tampil = $output[0];
			?>
			<?php
				require_once ('koneksi.php');
				if(isset($_GET['refresh_id'])){
					$id_cart = $_SESSION['sesi'];
					$id_detailcart = $_GET['refresh_id'];
					$jumlah = $_POST["id_jumlah_$id_detailcart"];
					//Mengambil data awal detail cart
					$sql = "SELECT * from tmp_detailcart where id_detailcart = '$id_detailcart'";
					$query = $conn->prepare($sql);
					$query->execute();
					$data = $query->fetch(PDO::FETCH_OBJ);
					$harga = $data->harga; //Set var harga
					$total = $harga*$jumlah; //set var jumlah
					$total_pertama = $data->total; //Menyimpan Total Sebelum di ubah
					//Mengambil data cart
					$sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
					$result = $conn->prepare($sql);
					$result->execute();
					foreach($result as $cart){}
					$total_awal = $cart['total'];
					$total_akhir=$total_awal-$total_pertama;
					//Memperbarui Nilai tmp_cart sebelum di rubah
					$sql = "UPDATE tmp_cart set total=$total_akhir where id_cart = '$id_cart'";
					$result = $conn->prepare($sql);
					$result->execute();
					//Merubah detail cart baru
					$sql = "UPDATE tmp_detailcart set jumlah = '$jumlah', total = '$total' where id_detailcart = '$id_detailcart'";
					$query = $conn->prepare($sql);
					$query->execute();
					//Mengambil detail cart terbaru
					$sql = "SELECT * from tmp_detailcart where id_detailcart = '$id_detailcart'";
					$result = $conn->prepare($sql);
					$result->execute();
					foreach($result as $detail){}
					//Mengambil data tmp_cart 
					$sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
					$result = $conn->prepare($sql);
					$result->execute();
					foreach($result as $cart){}
					$totaldrdetail = $detail['total']; //Mengambil nilai Total terbaru dari tmp_detailcart
					$total_awal = $cart['total']; //Mengambil nilai Total dari cart
					$total_akhir = $total_awal+$totaldrdetail; //Menghitung Total Akhir dimana total dr cart + total dr detail
					$sql = "UPDATE tmp_cart set total=$total_akhir where id_cart = '$id_cart'";
					$result = $conn->prepare($sql);
					$result->execute();
					echo "<script>window.location.replace('store.php?page=cart')</script>";
				}
			?>
			<h1 style="margin-bottom:20px; margin-top:10px">Keranjang Belanja (<?= $tampil ?>)</h1>
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">PRODUK</th>
							<th class="">HARGA</th>
							<th class="">JUMLAH</th>
							<th class="column-5">TOTAL</th>
						</tr>
						<?php
							//session_start();
							require_once ('koneksi.php');
							//$id = $_SESSION['sesi'];
							$connection = new ConnectionDB();
							$conn = $connection -> getConnection();
							
							$sql = "SELECT * from tmp_detailcart d, tb_produk p where d.id_produk=p.id_produk and id_cart = '$id'";
							$query = $conn->prepare($sql);
							$query->execute();
							$hitung = $query->rowCount();
							if($hitung > 0){
							foreach($query as $data){
								$id_produk = $data['id_produk'];
								$sql = "SELECT * FROM tb_foto where id_produk='$id_produk'";
								$result = $conn->prepare($sql);
								$result->execute();
								foreach($result as $foto){}
						?>
							<tr class="table-row">
								<td class="column-1">
									 <a href="store.php?page=cart&delete=<?= $data['id_detailcart']?>"><div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="../media/foto/<?= $foto['nama_foto'] ?>" alt="IMG-PRODUCT">
									</div></a>
								</td>
								<td class="column-2"><?= $data['nama_produk']?></td>
								<td class=""><?= "Rp. ".number_format($data['harga'], 2, ',','.') ?></td>
								<td class="">
									<div class="flex-w bo5 of-hidden w-size17">
										
										<form action="store.php?page=cart&refresh_id=<?= $data['id_detailcart'] ?>" method="post" class="flex-w">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
											</button>
											<input class="size8 m-text18 t-center num-product" type="text" name="id_jumlah_<?=$data['id_detailcart']?>" value="<?= $data['jumlah'] ?>">
											<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
											</button>
											<input type="submit" value="Simpan" class="btn btn-primary col-md-12" name="refresh">
										</form>
										
									</div>
								</td>
								<td class="column-5"><?= "Rp. ".number_format($data['total'], 2, ',','.') ?></td>
							</tr>
						<?php }}else{ ?>
							<tr class="table-row">
								<td colspan='4'><center>Keranjang Belanja Masih Kosong</center></td>
							</tr>
						<?php } ?>
					</table>
					<?php 
						require_once ('koneksi.php');
						if(isset($_GET['delete'])){
							$id = $_GET['delete'];
							$id_cart = $_SESSION['sesi'];
							$connection = new ConnectionDB();
							$conn = $connection -> getConnection();
							$sql = "SELECT * from tmp_detailcart where id_detailcart = '$id'";
							$result = $conn->prepare($sql);
							$result->execute();
							foreach($result as $detail){}
							$sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
							$result = $conn->prepare($sql);
							$result->execute();
							foreach($result as $cart){}
							$totaldrdetail = $detail['total'];
							$total_awal = $cart['total'];
							$total_akhir = $total_awal-$totaldrdetail;
							$sql = "UPDATE tmp_cart set total=$total_akhir where id_cart = '$id_cart'";
							$result = $conn->prepare($sql);
							$result->execute();
							//Query Delete
							$sql = "DELETE from tmp_detailcart where id_detailcart='$id'";
							$result = $conn->prepare($sql);
							$result->execute();
							//header('location: store.php?page=cart');
							echo "<script>window.location.replace('store.php?page=cart')</script>";
						}
					?>
				</div>
			</div>

			
			
			<!-- Total -->
			<div class="bo9 p-l-40 p-r-40 p-t-30 m-t-30  col-md-12">
				<h5 class="m-text20 p-b-24">
					Ringkasan Belanja
				</h5>
				<?php
					require_once ('koneksi.php');
					$id = $_SESSION['sesi'];
					$connection = new ConnectionDB();
					$conn = $connection -> getConnection();
					$sql = "SELECT * from tmp_cart where id_cart = '$id'";
					$query = $conn->prepare($sql);
					$query->execute();
					
					foreach($query as $data){}
				?>
				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?= "Rp. ".number_format($data['total'], 2, ',','.') ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?= "Rp. ".number_format($data['total'], 2, ',','.') ?>
					</span>
				</div>

				<div class="size15 trans-0-4" style="margin-bottom:40px">
					<!-- Button -->
					<a href="store.php?page=pembayaran"><button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Lanjut ke Pembayaran
					</button></a>
				</div>
			</div>
		</div>
	</section>