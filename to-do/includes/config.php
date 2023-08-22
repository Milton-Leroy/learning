<?php 
   $host = 'localhost';
   $dbname = 'todo';
   $dbusername = 'root';
   $dbpassword = '';

   try {

        $pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($pdo){
            echo 'success';
        }

   } catch (PDOException $e) {
        die('Could not connect to a database!' . $e->getMessage());
   }
?>