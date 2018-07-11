	

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
        <?php include 'asset/header_pesanan.php'?>
        <div class="col-md-12">
            <div class="bgwhite" style="padding:20px">
                <center><h3 style="margin-bottom:25px">Daftar Pesanan</h3></center>
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th >Kode Pesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pesanan</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            <?php
                            require_once ('koneksi.php');
                            $no = 1;
							$connection = new ConnectionDB();
                            $conn = $connection -> getConnection();
                            $id_pelanggan = $_SESSION['id_pelanggan'];
							$sql = "SELECT * from tb_pesanan where id_pelanggan='$id_pelanggan' ORDER BY statuspesanan DESC";
							$query = $conn->prepare($sql);
							$query->execute();
							foreach($query as $data){
                                $status = $data['statuspesanan'];
                                $no++;
						    ?>
                            <tr class="table-row">
                                <td ><?= $data['id_pesanan']?></td>
                                <td ><?= $data['tanggal']?></td>
                                <td><?= $data['statuspesanan']?></td>
                                <td><?= "Rp. ".number_format($data['total'], 2, ',','.') ?></td>
                            <td><center>
                                <a href="user.php?pesanan=<?= $data['id_pesanan']?>"><button class="btn btn-primary">Lihat Pesanan</button></a>
                                
                                <?php if($status == 'Pesanan Di Kirim'){ 
                                    $id_pesanan = $data['id_pesanan'];
                                    $sql = "SELECT * from tb_pesanan where id_pesanan='$id_pesanan' ";
                                    $pesan = $conn->prepare($sql);
                                    $pesan->execute();
                                    foreach($pesan as $id){}
                                    $_SESSION['id_pesanan'] = $id['id_pesanan'];
                                ?><a data-toggle="modal" data-target="#diterima" ><button class="btn btn-warning">Terima Pesanan</button></a><?php }?>
                                <?php if($status != 'Pesanan Di Kirim' && $status != 'Pesanan di Terima' && $status != 'Pesanan di Batalkan'){ ?><a data-toggle="modal" data-target="#dibatalkan" ><button class="btn btn-danger">Batalkan Pesanan</button></a><?php }?>
                                <center></td>
                            </tr>
                            <?php } ?>
                        </table>
            </div>
        </div>
	</section>