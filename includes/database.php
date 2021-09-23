<?php

    $dbhost = 'localhost'; // Unlikely to require changing
    $dbname = 'demiwear_Demiwears'; // Modify these...
    $dbuser = 'demiwear_Stephking'; // ...variables according
    $dbpass = 'Motunrayor@1$'; // ...to your installation
    $conn=new mysqli($dbhost, $dbuser,$dbpass, $dbname) or die('unable to connect: ');
?> 