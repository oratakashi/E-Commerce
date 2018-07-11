<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="col-md-12">
            <center><h3 style="margin-bottom:25px">Pilih Metode Pembayaran</h3></center>
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1">Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                                <th></th>
                            </tr>
                            <?php
                                require_once ('koneksi.php');
                                $connection = new ConnectionDB();
                                $conn = $connection -> getConnection();
                                $sql = "SELECT * from tb_rekening";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                foreach($query as $data){
                            ?>
                            <tr class="table-row">
                                <td class="column-1"><?= $data['nama_bank']?></td>
                                <td><?= $data['no_rek'] ?></td>
                                <td><?= $data['an']?></td>
                                <td><a href="aksi/pesanan_baru.php?payment=<?= $data['id_rekening']?>"><button class="btn btn-primary col-md-11">Bayar</button></a></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php
                                    require_once ('koneksi.php');
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $id_pesanan = $_GET['pesanan'];
                                    $sql = "SELECT * from tb_pesanan where id_pesanan='$id_pesanan'";
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    foreach($query as $data){}
                        ?>
                        
                    </div>
                </div>
        </div>
	</div>
</section>