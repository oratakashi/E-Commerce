<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_produk = $_POST['id_produk'];
                $nama_produk = $_POST['nama_produk'];
                $id_kategori = $_POST['kategori'];
                $harga_produk = $_POST['harga'];
                $jumlah_produk = $_POST['jumlah'];
                $sql = "UPDATE tb_produk set nama_produk=:nama_produk, id_kategori=:id_kategori, harga_produk=:harga_produk, jumlah_produk=:jumlah_produk where id_produk=:id_produk";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':id_produk' => $id_produk,
                    ':nama_produk'=> $nama_produk,
                    ':id_kategori'=> $id_kategori,
                    ':harga_produk'=> $harga_produk,
                    ':jumlah_produk'=> $jumlah_produk
                );
                $query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                $query->execute($dataBarang);
                header('Location: ../index.php?page=daftarbarang');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>