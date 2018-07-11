
<section class="shipping bg6 p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
								<?php
                                    require_once ("koneksi.php");
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_sosmed";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h1 class="m-text20 t-center">
				What's App
				</h1>
				<div class="s-text11 t-center">
					<a href="https://www.whatsapp.com" target="blank">
					<i class="fa fa-fw fa-whatsapp fa-2x" style="color:green;"></i>
					</a>
					<a style="font-size:13; color:green"><?= $data['nama_akun'] ?></a>
				</div>
			</div>
			
			<div class="flex-col-c w-size5 p-l-10 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h3 class="m-text20 t-center">
					Instagram
				</h3>

				<div class="s-text11 t-center">
					<a href="https://www.instagram.com" target="blank">
					<i class="fa fa-fw fa-instagram fa-2x"style="color:fanta;"></i>
					</a>
					<a style="font-size:13">@batik_ramelan</a>
				</div>
			</div>

			
		</div>
	</section>
