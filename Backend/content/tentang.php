<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Daftar Rekening</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Rekening</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php
                        require_once ("koneksi.php");
                        $connection = new ConnectionDB();
                        $conn = $connection -> getConnection();
                        $sql = "SELECT * from tb_sosmed";
                        $hasil = $conn->prepare($sql);
                        $hasil->execute();
                    ?>
                        <div class="card">
                            <div class="card-title">
                                <center><h4>Daftar Sosial Media</center></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    
                                        <thead>
                                            <tr>
                                                <th><center>Kode</center></th>
                                                <th><center>Nama Sosial Media</center></th>
                                                <th><center>Akun</center></th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($hasil as $data){ ?>
                                                <tr>
                                                    <td>
                                                         <?php echo $data['id_sosmed'] ?>
                                                    </td>
                                                    <td>
                                                         <?php echo $data['nama_sosmed'] ?>
                                                    </td>
                                                    <td>
                                                         <?php echo $data['nama_akun'] ?>
                                                    </td>
                                                    <td>
                                                        <center><a href="editsosmed.php?id=<?php echo $data['id_sosmed'] ?>"><button type="button" class="btn btn-inverse col-md-12">Edit</button></a></center>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                  
                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                    
                    <!-- column -->

                    <!-- column -->
                    
                    <!-- column -->
                </div>
                </div>
               
                <!-- End PAge Content -->
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