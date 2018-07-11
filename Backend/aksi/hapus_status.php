<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $id=$_GET['id'];
        $sql="DELETE from tb_pesanan where id_pesanan=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../index.php?page=sudahdiproses');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>