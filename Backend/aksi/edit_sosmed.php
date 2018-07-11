<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_sosmed = $_POST['id_sosmed'];
                $nama_akun = $_POST['nama_akun'];
                $sql = "UPDATE tb_sosmed set nama_akun='$nama_akun' where id_sosmed='$id_sosmed'";
                $query= $conn->prepare($sql);
                $query->execute();
                header('Location: ../index.php?page=tentang');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>