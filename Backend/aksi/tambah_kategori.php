<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_kategori = $_POST['nama_kategori'];
                $sql = "INSERT into tb_kategori (nama_kategori) values(:nama_kategori)";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':nama_kategori'=> $nama_kategori
                );
                //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                $query->execute($dataBarang);
                header('Location: ../index.php?page=daftarkategoribarang');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>