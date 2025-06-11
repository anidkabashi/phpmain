<?php 
include_once("config.php");


// Check if 'id' is provided in URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No ID provided in the URL.");
}


$id = $_GET['id'];


// Prepare and execute query
$sql = "SELECT * FROM users WHERE id = :id";
$prep = $conn->prepare($sql);
$prep->bindParam(':id', $id, PDO::PARAM_INT);
$prep->execute();


// Fetch user data
$data = $prep->fetch(PDO::FETCH_ASSOC);


if (!$data) {
    die("Error: No user found with ID = $id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>


    <style>


        form>input {
            margin-bottom: 10px;
            font-size: 20px;
            padding: 5px;
        }


        button {
            background: none;
            border: none;
            border: 1px solid black;
            padding: 10px 40px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    
    <form action="update.php" method="POST">
        
    <input type="hidden" name="id" value="<?php echo $data['id']?>"><br>
    <input type="text" name="username" value="<?php echo $data['username']?>"><br>
    <input type="text" name="name" value="<?php echo $data['name']?>"><br>
    <input type="text" name="surname" value="<?php echo $data['surname']?>"><br>
    <input type="email" name="email" value="<?php echo $data['email']?>"><br>


        <br><br>
        <button type="submit" name="update">UPDATE</button>
       
    </form>
    <a href="dashboard.php">Dashboard</a>
    </body>
</html>