<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Barang</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Tambah Barang</center></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/tambah_barang.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Nama" name="nama_produk">
                                        </div>
                                        <div class="form-group">
                                            <?php
                                                require_once ("koneksi.php");
                                                $connection = new ConnectionDB();
                                                $conn = $connection -> getConnection();
                                                $sql = "SELECT * from tb_kategori";
                                                $hasil = $conn->prepare($sql);
                                                $hasil->execute();
                                            ?>
                                            <select name="kategori" id="" class="form-control">
                                                <option value="">Kategori</option>
                                                <?php foreach($hasil as $data){ ?>
                                                <option value="<?php echo $data['id_kategori'] ?>" ><?php echo $data['nama_kategori'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Harga" placeholder="Harga" name="harga">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Jumlah" placeholder="Jumlah" name="jumlah">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="foto" id="" class="form-control">
                                        </div>
                                        <center>
                                            <input type="submit" value="OK" class="btn btn-success waves-effect waves-light m-r-10" name="submit">
                                            <a href="index.php?page=daftarbarang"><button type="button" class="btn btn-inverse">Batal</button></a>
                                        </center>
                                    </form>
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