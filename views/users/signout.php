<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        session_destroy();
        session_unset($_SESSION['user_id']);

        header("Location: index.php");
    }
?>