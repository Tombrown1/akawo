<?php
    function insert_ledger($mysqli,$user_id, $amount, $transaction_type, $description, $transaction_no, $date){
        $query = "INSERT INTO ledger(user_id, amount, transaction_type, description, transaction_no, date) VALUES('$user_id', '$amount', '$transaction_type', '$description', '$transaction_no', '$date')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        // print_r($query);
        // exit;
    }

    function update_ledger_by_transaction_id($mysqli, $transaction_id, $user_id, $amount, $transaction_type, $transaction_no, $description, $date){
        $query = "UPDATE ledger SET user_id = '".$user_id."', amount = '".$amount."', transaction_type = '".$transaction_type."', transaction_no = '".$transaction_no."', description = '".$description."', date = '".$date."' WHERE transaction_id =".$transaction_id;
       $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        // print_r($query);
        // exit(); 
    }

    function select_ledger_record($mysqli){
        $query = "SELECT * FROM (ledger) ORDER BY user_id DESC";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function select_ledger_by_id($mysqli, $transaction_id){
        $query = "SELECT * FROM ledger WHERE transaction_id =".$transaction_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function get_all_by_user_id($mysqli, $user_id){
        $query = "SELECT * FROM ledger WHERE user_id =". $user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    function select_amount_by_user_id($mysqli, $user_id){
        $query = "SELECT amount FROM ledger WHERE user_id =".$user_id;
    }

    function delete_ledger_record_by_id($mysqli, $transaction_id){
        $query = "DELETE FROM ledger WHERE transaction_id =".$transaction_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }
    function delete_ledger_record_by_userid($mysqli, $user_id){
        $query = "DELETE FROM ledger WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function user_amount($mysqli, $user_id){
        $query = "SELECT sum(amount) FROM ledger WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(myqli_error($mysqli));
        return $result;
    }

    function total_amount($mysqli){
        $query = "SELECT sum(amount) AS total_amount FROM ledger";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function user_acnt_balance($mysqli, $user_id){
        $query = "SELECT sum(amount) AS user_banlance FROM ledger WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }



    function insert_void_transaction($mysqli, $user_id, $amount, $transaction_no, $description, $date){
        $query = "INSERT INTO ledger(user_id, amount, transaction_no, description, date) VALUES('$user_id', '$amount', '$transaction_no', '$description', '$date')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;

        // print_r($query);
        // exit();
    }
?>