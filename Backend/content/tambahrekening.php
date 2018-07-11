<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Rekening</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Rekening</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                               <center><h4>Tambah Rekening Baru</center></h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="aksi/tambah_rekening.php" method="post">
                                        <div class="form-group">
                                            <select name="nama_bank" id="" class="form-control">
                                                <option value="">--Pilih Nama Bank--</option>
                                                <option value="Bank Mandiri">Bank Mandiri</option>
                                                <option value="Bank BRI">Bank BRI</option>
                                                <option value="Bank BCA">Bank BCA</option>
                                                <option value="Bank BNI">Bank BNI</option>
                                                <option value="Bank Danamon">Bank Danamon</option>
                                                <option value="Bank Jateng">Bank Jateng</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Atas Nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control Nama" placeholder="Nomor Rekening" name="no_rek">
                                        </div>
                                        <center>
                                            <input type="submit" value="Ok" class="btn btn-inverse" name="submit">
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