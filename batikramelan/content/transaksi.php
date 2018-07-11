	

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
        <?php include 'asset/header_pesanan.php'?>
        <div class="col-md-12">
            <div class="bgwhite" style="padding:20px">
                <center><h3 style="margin-bottom:25px">Riwayat Transaksi</h3></center>
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th >Kode Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            <?php
							require_once ('koneksi.php');
							$connection = new ConnectionDB();
                            $conn = $connection -> getConnection();
                            $id_pelanggan = $_SESSION['id_pelanggan'];
							$sql = "SELECT * from tb_transaksi where id_pelanggan='$id_pelanggan' ORDER BY statustransaksi DESC";
							$query = $conn->prepare($sql);
							$query->execute();
							foreach($query as $data){
                                $status = $data['statuspesanan'];
						    ?>
                            <tr class="table-row">
                                <td ><?= $data['id_transaksi']?></td>
                                <td ><?= $data['tanggal']?></td>
                                <td><?= $data['statustransaksi']?></td>
                                <td><?= "Rp. ".number_format($data['total'], 2, ',','.') ?></td>
                            <td><center>
                                <a href="user.php?transaksi=<?= $data['id_transaksi']?>"><button class="btn btn-primary">Lihat Transaksi</button></a>
                                <center></td>
                            </tr>

                            <?php } ?>
                        </table>
            </div>
        </div>
	</section>