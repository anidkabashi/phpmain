<?php
    $x=5; //global varible

    function localVariable(){
        $y=10;
       // echo  $x;
        echo  $y;
    }

    localVariable();
    echo "\n, $x";
?>