<?php
    function database_connect(){
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'akawo');

        $mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $mysqli;

        if(mysqli_connect_errno()){
            echo "Failed to connect to MYSQL: " . mysqli_connect_error();
        }
    }

?>