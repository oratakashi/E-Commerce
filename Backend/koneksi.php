<?php 
    class ConnectionDB{
        function getConnection(){
            $host="localhost";
            $username="root";
            $password="";

            try{
                $conn=new PDO("mysql:host=$host;dbname=batik_ramelan", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }catch(PDOException $e){
                echo "ERROR:" .$e->getMessage();
            }
        }
    }
?>