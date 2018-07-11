<?php 
    require_once ("koneksi.php");
    class Login{
        function masuk(){
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            try{
                if(isset($_POST['submit'])){
                    if(empty($_POST['email']) || empty($_POST['password'])){
                        header('location: login.php?error=true');
                    }else{
                        $email = $_POST['email'];
                        $password = md5($_POST['password']);
                        $sql = "SELECT * FrOm tb_pelanggan where email='$email'";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $count = $query->rowCount();
                        if($count == 1){
                            foreach($query as $data){
                                if($email!=$data['email']){
                                    header('location: login.php?error=true');
                                }else if($password!=$data['password']){
                                    header('location: login.php?error=true');
                                }else{
                                    session_start();
                                    $_SESSION['email'] = $email;
                                    $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
                                    $_SESSION['nama'] = $data['nama_pelanggan'];
                                    if(isset($_SESSION['sesi'])){
                                        $id_cart = $_SESSION['sesi'];
                                        $alamat = $data['alamat'];
                                        $no_hp = $data['no_telp'];
                                        $nama = $data['nama_pelanggan'];
                                        $sql = "INSERT into tmp_pengiriman (id_cart, nama_pelanggan, alamat, no_hp) values ('$id_cart', '$nama', '$alamat', '$no_hp')";
                                        $result = $conn->prepare($sql);
                                        $result->execute();
                                    }
                                    header('location:store.php');
                                }
                            }
                        }else{
                            header('location: login.php?error=true');
                        }
                    }
                }
            }catch (PDOException $e){
                echo "ERROR : " .$e->getMessage();
            }
        }
    }
    $login = new Login();
    $login->masuk();
?>