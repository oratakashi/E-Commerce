<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_pelanggan = $_POST['id_pelanggan'];
                $nama_pelanggan = $_POST['nama_pelanggan'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $sql = "UPDATE tb_pelanggan set nama_pelanggan=:nama_pelanggan, email=:email, alamat=:alamat, no_telp=:no_telp where id_pelanggan=:id_pelanggan";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':id_pelanggan' => $id_pelanggan,
                    ':nama_pelanggan'=> $nama_pelanggan,
                    ':email'=> $email,
                    ':alamat'=> $alamat,
                    ':no_telp'=> $no_telp
                );
                $query->bindValue( ":id_pelanggan", $id_pelanggan, PDO::PARAM_INT );
                $query->execute($dataBarang);
                header('Location: ../index.php?page=lihatpelanggan');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>