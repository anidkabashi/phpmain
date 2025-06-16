<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style>
            table,td,th{
                border:1px solid black;
                border-collapse:collapse;
            }
            td,th{
                padding:10px 20px;
            }
        </style>
</head>

<body>


<?php
    include_once('config.php');
    $sql = "SELECT * FROM users";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();
    $users=$getUsers->fetchAll();
?>

    <br><br>

    <tabele>
        <thead>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Update</th>

</thead>
    <tbody>


            <table>
        <thead>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Update</th>
        </thead>
        <tbody>
            <?php
                foreach($users as $user){
            ?>
            <tr>
                <td> <?=$user['id']?></td>
                <td> <?=$user['username']?></td>
                <td> <?=$user['name']?></td>
                <td> <?=$user['surname']?></td>
                <td> <?=$user['email']?></td>
                <td> <?= "<a href='delete.php?id=$user[id]'> Delete</a>| <a href='edit.php?id=$user[id]'> Update </a>"?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
            <a href="index.php">Add User</a>
   </body>
</html>
        
            
            