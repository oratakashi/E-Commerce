<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $id=$_GET['id'];
        $sql="DELETE from tb_rekening where id_rekening=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../index.php?page=daftarrekening');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>