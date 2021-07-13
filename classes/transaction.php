<?php
    function select_transaction($mysqli){
        $query = "SELECT * FROM transaction_type";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function select_transaction_type_by_id($mysqli, $tran_type_id){
        $query = "SELECT * FROM transaction_type WHERE tran_type_id=".$tran_type_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
?>