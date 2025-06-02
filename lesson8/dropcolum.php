<?php
    try{
          $pdo = new PDO("mysql:host=localhost;dbname=testdb", "root", "");


           $sql = "ALTER TABLE products DROP COLUMN name";


           $pdo->exec($sql);


            echo "Column dropped successfully!";
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
?>