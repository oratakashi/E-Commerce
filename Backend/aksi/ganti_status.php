<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $id_pesanan = $_POST['id'];
                $status = $_POST['status'];
                $sql = "UPDATE tb_pesanan set statuspesanan=:statuspesanan where id_pesanan=:id_pesanan";
                $query= $conn->prepare($sql);
                $dataPesanan = array(
                    ':id_pesanan' => $id_pesanan,
                    ':statuspesanan'=> $status
                );
                $query->bindValue( ":id_pesanan", $id_pesanan, PDO::PARAM_INT );
                $query->execute($dataPesanan);
                header('Location: ../index.php?page=semuapesanan');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>