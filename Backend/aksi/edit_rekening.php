<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_rekening = $_POST['id_rekening'];
                $nama_bank = $_POST['nama_bank'];
                $no_rek= $_POST['no_rek'];
                $an = $_POST['nama'];
                $sql = "UPDATE tb_rekening set nama_bank=:nama_bank, no_rek=:no_rek, an=:an where id_rekening=:id_rekening";
                $query= $conn->prepare($sql);
                $dataBarang = array(
                    ':id_rekening' => $id_rekening,
                    ':nama_bank'=> $nama_bank,
                    ':no_rek'=> $no_rek,
                    ':an'=> $an
                );
                $query->bindValue( ":id_rekening", $id_rekening, PDO::PARAM_INT );
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