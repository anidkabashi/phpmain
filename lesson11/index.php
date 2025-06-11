<!DOCTYPE html>


<html>
    <head>
        <title>Documet</title>

        <style>
            form>input{
                margin-bottom:10px;
                font-size:20px;
                padding:5px;
            }

            button{
                border:1px solid black;
                padding:10px 40px;
                font-size:20px;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <form action="add.php" method="POST">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="surname" placeholder="Surname"><br>
            <input type="password" name="password" placeholder="Passord"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <button type="submit" name="submit">Add</button>
        </form>
    </body>
</html>

