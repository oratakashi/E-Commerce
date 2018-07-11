<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ganti Status Pesanan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ganti Status Pesanan</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                         <?php
                            require_once ("koneksi.php");
                            $id=$_GET['id'];
                            $connection = new ConnectionDB();
                            $conn = $connection -> getConnection();
                            $sql = "SELECT * from tb_pesanan p INNER JOIN tb_pelanggan g where p.id_pelanggan=g.id_pelanggan AND p.id_pesanan='$id'";
                            $hasil = $conn->prepare($sql);
                            $hasil->execute();
                            foreach($hasil as $data){}
                        ?>
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Ganti Status Pesanan</center></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-md-10" style="padding-right:1px">
                                            <form action="aksi/ganti_status.php" method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kode " name="id" placeholder="Kode Pesanan" value="<?php echo $data['id_pesanan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Nama" name="nama" placeholder="Nama Pelanggan" value="<?php echo $data['nama_pelanggan'] ?>"disabled>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kategori" name="total" placeholder="Total Bayar" value="<?php echo $data['total'] ?>"disabled>
                                                </div>
                                                <div class="form-group">
                                                    <select name="status" class="form-control">
                                                        <option value="Diproses">Sudah Diproses</option>
                                                        <option value="Pesanan Di Kirim">Dikirim</option>
                                                        <option value="Diterima">Diterima</option>
                                                        <option value="Dibatalkan">Dibatalkan</option>
                                                    </select>
                                                </div>
                                                <center>
                                                    <input type="submit" value="OK" class="btn btn-success waves-effect waves-light m-r-10" name="submit">
                                                    <a href="index.php?page=belumdiproses"><button type="button" class="btn btn-inverse">Batal</button></a>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    
                    <!-- /# column -->
                </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <div class="app-footer app-footer-default" id="footer"><br><br>
            <br>
                <div class="app-footer-line darken">               
                    <div class="copyright wide text-center">&copy; 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
                </div>
            </div>
            <!-- End footer -->
        </div>
    </div>
</div>