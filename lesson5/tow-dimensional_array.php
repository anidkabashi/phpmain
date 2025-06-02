<?php
    $dogs = array(
        array("Husky", "Siberia", 15),
        array("Bulldog", "England", 10),
        array("Chihuahua", "Mexico", 20)
    );

    echo $dogs[0][0]. ": Origion:". $dogs[0][1], "Life Span:". $dogs[0][2]. "<br>";
    echo $dogs[1][0]. ": Origion:". $dogs[1][1], "Life Span:". $dogs[1][2]. "<br>";
    echo $dogs[2][0]. ": Origion:". $dogs[2][1], "Life Span:". $dogs[2][2]. "<br>";

    for($row=0;$row<3;$row++){
        echo "<p><b>Row number $row </b></p>";
        echo "<ul>";
        for($col=0;$col<3;$col++){
            echo "<li>" .$dogs[$row][$col] ."</li>";
        }
        "</ul>";
    }

?>