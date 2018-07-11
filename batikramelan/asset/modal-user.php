<div class="modal fade" id="diterima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingin Menerima Pesanan?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  	Pilih Terima Pesanan jika barang sudah sampai <br>
			Barang yang sudah di terima tidak dapat di kembalikan.
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="aksi/terima_pesanan.php?id=<?= $_SESSION['id_pesanan'] ?>">Terima Pesanan</a>
          </div>
        </div>
      </div>
</div>
<div class="modal fade" id="dibatalkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingin Membatalkan Pesanan?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  	Anda yakin ingin membatalkan pesanan? <br>
			Jika Pesanan dibatalkan , uang akan di kembalikan 100%.
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="#">Batalkan Pesanan</a>
          </div>
        </div>
      </div>
</div>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Silahkan Masukan Email dan Kata Sandi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="proses.php" method="post">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <input type="submit" value="Login" class="btn btn-primary btn-flat col-md-12" name="submit">
                            
            </form>
		      </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
</div>