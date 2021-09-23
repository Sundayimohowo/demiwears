<?php

    $dbhost = 'localhost'; // Unlikely to require changing
    $dbname = 'db_name'; // Modify these...
    $dbuser = 'db_user'; // ...variables according
    $dbpass = 'password'; // ...to your installation
    $conn=new mysqli($dbhost, $dbuser,$dbpass, $dbname) or die('unable to connect: ');
?> 
