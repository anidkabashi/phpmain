<?php
    include_once('config.php');

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $temPass = $_POST['password'];
        $password = password_hash($temPass, PASSWORD_DEFAULT);

        if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password))
        {
            echo "you need to fill all te fields";
        }

        else{
            $sql ="SELECT username FROM users Where username=:username";
            $tempSQL->bindParam(':username', $username);
            $tempSQL->execute();

            if($tempSQL->rowCount() > 0)
            {
                echo "Username exists!";
                header ("refresh:2; url=signup.php");
            }
            else
            {
                $sql = "insert into users (name, surname, username, email, password) values (:name, :surname, :username, :email, :password)"
                $insertSQL=$conn->prepare($sql);

                $insertSQL->bindParam(':name', $name);
                $insertSQL->bindParam(':surname', $surname);
                $insertSQL->bindParam(':username', $username);
                $insertSQL->bindParam(':email', $email);
                $insertSQL->bindParam(':password', $password);

                $insertSQL->execute();

                echo "Data saved successfully";
                
                header ("refresh:2; url=login.php");
            }
        }
    }
?>