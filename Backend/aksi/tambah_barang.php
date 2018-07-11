<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_produk = $_POST['nama_produk'];
                $id_kategori = $_POST['kategori'];
                $harga_produk = $_POST['harga'];
                $jumlah_produk = $_POST['jumlah'];
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $acak = round(microtime(true));
                $fotobaru = $acak.$foto;
                $lokasi = "../../media/foto/".$fotobaru;
                $sql = "INSERT into tb_produk (id_kategori, nama_produk, harga_produk, jumlah_produk) values(:id_kategori, :nama_produk, :harga_produk, :jumlah_produk)";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':nama_produk'=> $nama_produk,
                    ':id_kategori'=> $id_kategori,
                    ':harga_produk'=> $harga_produk,
                    ':jumlah_produk'=> $jumlah_produk
                );
                //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                $query->execute($dataBarang);
                $sql = "SELECT * FROM tb_produk where nama_produk = '$nama_produk'";
                $query = $conn->prepare($sql);
                $query->execute();
                foreach($query as $data){}
                $id_produk = $data['id_produk'];
                //Upload Foto
                if(move_uploaded_file($tmp_foto, $lokasi)){
                    $sql = "INSERT into tb_foto (id_produk, nama_foto) values('$id_produk','$fotobaru')";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    header('Location: ../index.php?page=daftarbarang');
                }else{
                    echo "Gagal Menginput Data";
                }
                
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>