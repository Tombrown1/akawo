<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
        session_destroy();
        session_unset($_SESSION['admin_id']);

        header("Location: index.php");
    }
?>