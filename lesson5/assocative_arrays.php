<?php
    $grade=array(
        "Math" => "3",
        "Art" => "5",
        "history"=> "4",
        "Music" => "4"
    );

    foreach($grade as $sublect=> $grade){
        echo "Subject:" . $subect . ", Grade:" . $grade;
        echo "<br>";
    }

?>