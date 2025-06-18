<?php
    include_once('config.php');


    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname =$_POST['surname'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        $sql = "INSERT INTO users (username, name, surname, password, email) values (:username, :name, :surname, :password, :email)";
        $sqlQuery =$conn->prepare($sql);


         $sqlQuery->bindParam(':username', $username);
        $sqlQuery->bindParam(':name', $name);
        $sqlQuery->bindParam(':surname', $surname);
         $sqlQuery->bindParam(':password', $password);
        $sqlQuery->bindParam(':email', $email);


        $sqlQuery->execute();



     echo "Data saved succesfully";


     echo "<br>";


     echo "<a href='dashboard.php'>Dashboard</a>";


    }
?>