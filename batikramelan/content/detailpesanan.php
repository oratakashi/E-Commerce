	

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
        <?php include 'asset/header_pesanan.php'?>
        <div class="col-md-12">
            <div class="bgwhite" style="padding:20px">
                <center><h3 style="margin-bottom:25px">Kode Pesanan : <?= $_GET['pesanan']?></h3></center>
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">PRODUK</th>
                                <th class="column-4">HARGA</th>
                                <th class="column-3">JUMLAH</th>
                                <th class="column-5">TOTAL</th>
                            </tr>
                            <?php
                                require_once ('koneksi.php');
                                $connection = new ConnectionDB();
                                $conn = $connection -> getConnection();
                                $id_pesanan = $_GET['pesanan'];
                                $sql = "SELECT * from tb_detailpesanan a, tb_produk b where a.id_produk=b.id_produk and a.id_pesanan='$id_pesanan'";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                foreach($query as $data){
                                    $id_produk = $data['id_produk'];
                                    $sql = "SELECT * FROM tb_foto where id_produk='$id_produk'";
                                    $result = $conn->prepare($sql);
                                    $result->execute();
                                    foreach($result as $foto){}
                            ?>
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="../media/foto/<?= $foto['nama_foto'] ?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?= $data['nama_produk']?></td>
                                <td class="column-4"><?= "Rp. ".number_format($data['harga_produk'], 2, ',','.') ?></td>
                                <td class="column-3"><?= $data['qty']?></td>
                                <td class="column-5"><?= "Rp. ".number_format($data['total'], 2, ',','.') ?></td>
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
                        <div class="bo9 p-l-40 p-r-40 p-t-30 m-t-30  col-md-12">
                            <h5 class="m-text20 p-b-24">
                                Total Belanja
                            </h5>

                            <!--  -->
                            <div class="flex-w flex-sb-m p-b-12">
                                <span class="s-text18 w-size19 w-full-sm">
                                    Status Pesanan:
                                </span>

                                <span class="m-text21 w-size20 w-full-sm">
                                    <?= $data['statuspesanan']?>
                                </span>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                                <span class="m-text22 w-size19 w-full-sm">
                                    Total Belanja:
                                </span>
                                <span class="m-text21 w-size20 w-full-sm">
                                <?= "Rp. ".number_format($data['total'], 2, ',','.') ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>