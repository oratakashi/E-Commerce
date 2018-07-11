<div class="page-wrapper">
            <!-- Bread crumb -->
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Form Edit Barang</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_produk where id_produk=$id";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-md-10" style="padding-right:1px">
                                            <form action="aksi/edit_barang.php  " method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kode " placeholder="Kode" name="id_produk" value="<?php echo $data['id_produk'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Nama" placeholder="Nama" name="nama_produk" value="<?php echo $data['nama_produk'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kategori" placeholder="Kategori" name="kategori" value="<?php echo $data['id_kategori'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Harga" placeholder="Harga" name="harga" value="<?php echo $data['harga_produk'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Jumlah" placeholder="Jumlah" name="jumlah" value="<?php echo $data['jumlah_produk'] ?>">
                                                </div>
                                                <center>
                                                    <input type="submit" value="Save"  class="btn btn-success waves-effect waves-light m-r-10" name="submit">
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