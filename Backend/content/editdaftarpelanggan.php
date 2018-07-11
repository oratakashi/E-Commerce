<div class="page-wrapper">
            <!-- Bread crumb -->
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Form Edit Daftar Pelanggan</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_pelanggan where id_pelanggan=$id";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-md-10" style="padding-right:1px">
                                            <form action="aksi/edit_daftarpelanggan.php  " method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control Kode " placeholder="Kode" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Nama" placeholder="Nama" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Email" placeholder="Email" name="email" value="<?php echo $data['email'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control Alamat" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control No_telp" placeholder="No_telp" name="no_telp" value="<?php echo $data['no_telp'] ?>">
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