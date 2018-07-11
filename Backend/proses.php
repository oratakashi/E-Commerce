<?php 
    require_once("koneksi.php");
    class login{
        function masuk(){
            $connection= new ConnectionDB();
            $conn= $connection->getConnection();

            try{
                if(isset($_POST['submit'])){
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $sql="select * from login";
                    $result=$conn->prepare($sql);
                    $result->execute();
                    $count=$result->rowCount();
                        foreach($result as $data){
                            if($username!=$data['username']){
                                header('location: login.php');
                            }elseif($password!=$data['password']){
                                header('location: login.php');
                            }else{
                                session_start();
                                $_SESSION['username']=$username;
                                header('location: index.php');
                            }
                        }
                }
            }catch(PDOException $e){
                echo "ERROR:" .$e->getMessage();
            }
        }
    }
    $login = new Login();
    $login->masuk();
?>