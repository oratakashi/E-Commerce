<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nama_bank = $_POST['nama_bank'];
                $an = $_POST['nama'];
                $no_rek = $_POST['no_rek'];
                $sql = "INSERT into tb_rekening (nama_bank, no_rek, an) values(:nama_bank, :no_rek, :nama)";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':nama_bank'=> $nama_bank,
                    ':no_rek'=>$no_rek,
                    ':nama'=>$an
                );
                //$query->bindValue( ":id_produk", $id_produk, PDO::PARAM_INT );
                $query->execute($dataBarang);
                header('Location: ../index.php?page=daftarrekening');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>