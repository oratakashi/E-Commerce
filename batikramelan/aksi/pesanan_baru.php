<?php
    require_once ('../koneksi.php');
    session_start();
    $connection = new ConnectionDB();
    $conn = $connection->getConnection();
    //Mempersiapkan Variabel
    $payment = $_GET['payment']; //Mengambil data Rek Yang dipilih
    $status_pesanan = 'Belum diproses';
    $tanggal = date('Y-m-d');
    $id_cart = $_SESSION['sesi'];
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_pesanan = 'BR'.$id_cart; //Membuat Kode Pesanan Dengan Format BR[Angka Acak]
    //Mempersiapkan Data yang ada di Cart
    $sql = "SELECT * from tmp_cart where id_cart='$id_cart'";
    $result = $conn->prepare($sql);
    $result->execute();
    $cart = $result->fetch(PDO::FETCH_OBJ);
    $total_cart = $cart->total; //Mengambil Data Total Cart
    //Mengambil Data Pengiriman
    $sql = "SELECT * from tmp_pengiriman where id_cart = '$id_cart'";
    $result = $conn->prepare($sql);
    $result->execute();
    $pengiriman = $result->fetch(PDO::FETCH_OBJ);
    $nama_pelanggan = $pengiriman->nama_pelanggan;
    $alamat = $pengiriman->alamat;
    $no_hp = $pengiriman->no_hp;
    //Menginputkan ke Pesanan
    $sql = "INSERT into tb_pesanan values ('$id_pesanan', '$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_hp', '$total_cart', '$status_pesanan', '$payment', '$tanggal')";
    $result = $conn->prepare($sql);
    $result->execute();
    //Mencopy detailcart ke detail Pesanan
    $sql = "SELECT * from tmp_detailcart where id_cart='$id_cart'";
    $result = $conn->prepare($sql);
    $result->execute();
    foreach($result as $detail){
        $id_produk = $detail['id_produk'];
        $qty = $detail['jumlah'];
        $id_detail = $detail['id_detailcart'];
        $total = $detail['total'];
        $sql = "INSERT into tb_detailpesanan values ('$id_detail', '$id_pesanan', '$id_produk', '$qty', '$total')";
        $result = $conn->prepare($sql);
        $result->execute();
    }
    $sql = "DELETE from tmp_cart where id_cart = '$id_cart'";
    $result = $conn->prepare($sql);
    $result->execute();
    unset($_SESSION['sesi']);
    header('location: ../store.php?page=order-sukses')
?>