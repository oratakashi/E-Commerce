<?php
    session_start();
    require_once '../koneksi.php';
    $connection = new ConnectionDB();
    $conn = $connection->getConnection();
    if(isset($_POST['gantiPengirim'])){
        $id_cart = $_SESSION['sesi'];
        $penerima = $_POST['penerima'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $sql = "UPDATE tmp_pengiriman set nama_pelanggan = '$penerima', alamat = '$alamat', no_hp = '$no_hp' where id_cart = '$id_cart'";
        $query = $conn->prepare($sql);
        $query->execute();
        header('location: ../store.php?page=cart');
    }
?>