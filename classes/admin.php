<?php
    function insert_admin($mysqli, $admin_name, $admin_email, $admin_phone, $admin_pass){
        $query = "INSERT INTO admin(admin_name, admin_email, admin_phone, admin_pass) VALUES('$admin_name', '$admin_email', '$admin_phone', '".md5($admin_pass)."')";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
        // print_r($query);
        // exit();
    }

    function select_all_admin($mysqli){
        $query = "SELECT * FROM admin()";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function select_all_admin_by_id($mysqli, $admin_id){
        $query = "SELECT * FROM admin WHERE admin_id =".$admin_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function update_admin($mysqli, $admin_id, $admin_name, $admin_email, $admin_phone, $admin_pass){
        $query = "UPDATE user SET admin_name = '".$admin_name."', admin_email = '".$admin_email."', admin_phone = '".$admin_phone."', admin_pass = '".MD5($admin_pass)."' WHERE admin_id =".$admin_id;
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli)); 
    }

    function admin_login($mysqli, $admin_email, $admin_pass){
        $query = "SELECT * FROM admin WHERE admin_email = '".$admin_email."' AND admin_pass = '".md5($admin_pass)."'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        return $result;
    }

    function check__admin_email($mysqli, $admin_email){
        $query = "SELECT * FROM admin WHERE admin_email =".$admin_email;
        $result = mysqli_query($mysqli, $query) or die(mysqli_query($mysqli));
        return $result;
    }



?>