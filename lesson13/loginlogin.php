<?php
 include_once('config.php');

 if(ISSET($_POST['submit']))
 {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password))
    {
        echo "you need to fill all te fields";
        header ("refresh:2; url=signup.php");
    }else{
        sql ="SELECT username FROM user Where username=:username";
        $insertSql=$conn->prepare($sql);
            $tempSQL->bindParam(':username,' $username);
            $tempSQL->execute();
    }
 }
?>