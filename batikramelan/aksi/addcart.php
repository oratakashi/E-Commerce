<?php
    session_start();
    if(empty($_SESSION['sesi'])){
        $random = round(microtime(true));
        $_SESSION['sesi']=$random; //Membuat Sesi baru dengan angka random
        //Apakah Pernah Mengklik Add Cart?
        if($_GET['src']=='detail'){
            $jumlah = $_POST['jumlah'];
            $id = $_POST['id'];
            $id_cart = $random; //Membuat ID Cart Baru
            $id_pelanggan = $_SESSION['id_pelanggan'];
            require_once '../koneksi.php';
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            $sql = "SELECT * from tb_produk where id_produk = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $hasil = $query->fetch(PDO::FETCH_OBJ);
            $sql = "INSERT into tmp_cart values ('$id_cart','0')";
            $query = $conn->prepare($sql);
            $query->execute();
            $total = $hasil->harga_produk * $jumlah;
            $harga = $hasil->harga_produk;
            $sql = "INSERT into tmp_detailcart (id_cart, id_produk, harga, jumlah, total) values ('$id_cart', '$id', '$harga', '$jumlah', '$total')";
            $query = $conn->prepare($sql);
            $query->execute();
            //Jika Sudah Login
            if(isset($_SESSION['email'])){
                $sql = "SELECT * from tb_pelanggan where id_pelanggan = '$id_pelanggan'";
                $query = $conn->prepare($sql);
                $query->execute();
                foreach($query as $pelanggan){}
                $alamat = $pelanggan['alamat'];
                $no_hp = $pelanggan['no_telp'];
                $nama = $pelanggan['nama_pelanggan'];
                $sql = "INSERT into tmp_pengiriman (id_cart, nama_pelanggan, alamat, no_hp) values ('$id_cart', '$nama', '$alamat', '$no_hp')";
                $query = $conn->prepare($sql);
                $query->execute();
            }
            //=====================
            $sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            foreach($query as $data){}
                $total_lama = $data['total'];
                $total_baru = $total_lama + $total;
            $sql = "UPDATE tmp_cart set total='$total_baru' where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            header("location: ../detailproduk.php?id=$id");
        }elseif($_GET['src']=='produk'){
            $id = $_GET['id'];
            $id_cart = $random;
            $jumlah = 1;
            $sumber = $_GET['sumber'];
            $id_pelanggan = $_SESSION['id_pelanggan'];
            require_once '../koneksi.php';
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            $sql = "SELECT * from tb_produk where id_produk = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $hasil = $query->fetch(PDO::FETCH_OBJ);
            $sql = "INSERT into tmp_cart values ('$id_cart','0')";
            $query = $conn->prepare($sql);
            $query->execute();
            $total = $hasil->harga_produk * $jumlah;
            $harga = $hasil->harga_produk;
            $sql = "INSERT into tmp_detailcart (id_cart, id_produk, harga, jumlah, total) values ('$id_cart', '$id', '$harga', '$jumlah', '$total')";
            $query = $conn->prepare($sql);
            $query->execute();
            if(isset($_SESSION['email'])){
                $sql = "SELECT * from tb_pelanggan where id_pelanggan = '$id_pelanggan'";
                $query = $conn->prepare($sql);
                $query->execute();
                foreach($query as $pelanggan){}
                $alamat = $pelanggan['alamat'];
                $no_hp = $pelanggan['no_telp'];
                $nama = $pelanggan['nama_pelanggan'];
                $sql = "INSERT into tmp_pengiriman (id_cart, nama_pelanggan, alamat, no_hp) values ('$id_cart', '$nama', '$alamat', '$no_hp')";
                $query = $conn->prepare($sql);
                $query->execute();
            }
            $sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            foreach($query as $data){}
                $total_lama = $data['total'];
                $total_baru = $total_lama + $total;
            $sql = "UPDATE tmp_cart set total='$total_baru' where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            header("location: ../$sumber");
        }
    }else{
        $random = $_SESSION['sesi'];
        if($_GET['src']=='detail'){
            $jumlah = $_POST['jumlah'];
            $id = $_POST['id'];
            $id_cart = $random;
            $acak = round(microtime(true));
            $detail_chart= $acak.'0';
            require_once '../koneksi.php';
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            $sql = "SELECT * from tb_produk where id_produk = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $hasil = $query->fetch(PDO::FETCH_OBJ);
            $total = $hasil->harga_produk * $jumlah;
            $harga = $hasil->harga_produk;
            $sql = "INSERT into tmp_detailcart (id_cart, id_produk, harga, jumlah, total) values ('$id_cart', '$id', '$harga', '$jumlah', '$total')";
            $query = $conn->prepare($sql);
            $query->execute();
            $sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            foreach($query as $data){}
                $total_lama = $data['total'];
                $total_baru = $total_lama + $total;
            $sql = "UPDATE tmp_cart set total=$total_baru where id_cart = $id_cart";
            $query = $conn->prepare($sql);
            $query->execute();
            header("location: ../detailproduk.php?id=$id");
        }elseif($_GET['src']=='produk'){
            $id = $_GET['id'];
            $id_cart = $random;
            $jumlah = 1;
            $sumber = $_GET['sumber'];
            require_once '../koneksi.php';
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            $sql = "SELECT * from tb_produk where id_produk = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $hasil = $query->fetch(PDO::FETCH_OBJ);
            $total = $hasil->harga_produk * $jumlah;
            $harga = $hasil->harga_produk;
            $sql = "INSERT into tmp_detailcart (id_cart, id_produk, harga, jumlah, total) values ('$id_cart', '$id', '$harga', '$jumlah', '$total')";
            $query = $conn->prepare($sql);
            $query->execute();
            $sql = "SELECT * from tmp_cart where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            foreach($query as $data){}
                $total_lama = $data['total'];
                $total_baru = $total_lama + $total;
            $sql = "UPDATE tmp_cart set total='$total_baru' where id_cart = '$id_cart'";
            $query = $conn->prepare($sql);
            $query->execute();
            header("location: ../$sumber");
        }
    }
?>
