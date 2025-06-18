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
            $sql ="SELECT username FROM user Where username=:username";
            $tempSQL->bindParam(':username,' $username);
            $tempSQL->execute();

            if($tempSQL->rowCount() > 0)
            {
                echo "Username exists!";
                header ("refresh:2; url=signup.php");
            }
            else
            {
                $sql = "insert into users (name, surname, username, email, password) values (:name, :surname, :username, :email, :password)"
                $insertsSQL+$conn->prepare($sql);

                $insertsSQL->bindParam(':name', $name);
                $insertsSQL->bindParam(':surname', $surname);
                $insertsSQL->bindParam(':username', $username);
                $insertsSQL->bindParam(':email', $email);
                $insertsSQL->bindParam(':password', $password);

                $insertsSQL->execute();

                echo "Data saved successfully";
                
                header ("refresh:2; url=login.php");
            }
        }
    }
?>