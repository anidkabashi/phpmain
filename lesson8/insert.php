<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=db", "root", "");

        $username = "Festa";

        $password = password_hash("mypasswprd", PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (username, Password) VALUE ('$username', '$passowrd'  )";

    }catch(Exception $e){
    echo "Error creating table: " . $e->getMessage();


    }

?>