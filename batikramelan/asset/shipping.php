
<section class="shipping bg6 p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
								<?php
                                    require_once ("koneksi.php");
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_sosmed";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){
                                ?>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h1 class="m-text20 t-center">
				<?= $data['nama_sosmed'] ?>
				</h1>
				<div class="s-text11 t-center">
					<a href="https://www.whatsapp.com" target="blank">
					<i class="fa fa-fw fa-<?php $nama = strtolower($data['nama_sosmed']); echo $nama;?> fa-2x" style="color:<?php if($data['nama_sosmed']=='Whatsapp'){echo "green";}elseif($data['nama_sosmed']=='Instagram'){echo "fanta";}elseif($data['nama_sosmed']=='Facebook'){echo "blue";} ?>;"></i>
					</a>
					<a style="font-size:13; color:<?php if($data['nama_sosmed']=='Whatsapp'){echo "green";}elseif($data['nama_sosmed']=='Instagram'){echo "fanta";}elseif($data['nama_sosmed']=='Facebook'){echo "blue";} ?>"><?= $data['nama_akun'] ?></a>
				</div>
			</div>
									
			<?php } ?>
		</div>
	</section>
