<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ubah Sosial Media</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Sosial Media</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Ubah Rekening</center></h4>
                               <?php
                                    require_once ("koneksi.php");
                                    $id=$_GET['id'];
                                    $connection = new ConnectionDB();
                                    $conn = $connection -> getConnection();
                                    $sql = "SELECT * from tb_sosmed where id_sosmed = '$id'";
                                    $hasil = $conn->prepare($sql);
                                    $hasil->execute();
                                    foreach($hasil as $data){}
                                ?>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/edit_sosmed.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Atas Nama" name="id_sosmed" hidden readonly value="<?= $data['id_sosmed']?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Atas Nama" name="nama_sosmed" readonly value="<?= $data['nama_sosmed']?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Nama Akun" name="nama_akun" value="<?= $data['nama_akun']?>">
                                        </div>
                                        <center>
                                            <input type="submit" value="Simpan" class="btn btn-inverse" name="submit">
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