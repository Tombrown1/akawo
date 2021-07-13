<?php
    function insert_user($mysqli, $user_name, $user_email, $user_phone, $user_pass){
        $query = "INSERT INTO users(user_name, user_email, user_phone, user_pass) VALUES('$user_name', '$user_email', '$user_phone', '".md5($user_pass)."')";
       $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
       return $result;
        // print_r($query);
        // exit;

    }

    function select_all_users($mysqli){
        $query = "SELECT * FROM users ";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function select_all_user_by_id($mysqli, $user_id){
        $query = "SELECT * FROM users WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }    

    function update_user($mysqli, $user_id, $user_name, $user_email, $user_phone, $user_pass){
        $query = "UPDATE user SET user_name = '".$user_name."', user_email = '".$user_email."', user_phone = '".$user_phone."', user_pass = '".MD5($user_pass)."' WHERE user_id =".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli)); 
        return $result;
    }

    function user_login($mysqli, $user_email, $user_pass){
        $query = "SELECT * FROM users WHERE user_email ='".$user_email."' AND user_pass ='".md5($user_pass)."' ";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;

        // print_r($query);
        // exit;
    }

    function check_email($mysqli, $user_email){
        $query = "SELECT * FROM user WHERE user_email =".$user_email;
        $result = mysqli_query($mysqli, $query) or die(mysqli_query($mysqli));
        return $result;
    }

    function delete_user_by_user_id($mysqli, $user_id){
        $query = "DELETE FROM ledger WHERE user_id=".$user_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));        
    }




?>