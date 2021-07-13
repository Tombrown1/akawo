<?php
    include_once '../../database_conn/db_connection.php';
    $mysqli = database_connect();
      session_start();
      if(!isset($_SESSION['admin_id'])){
        header("Location: signin.php");
        exit();
    }

    include_once '../../classes/ledger.php';
    include_once '../../classes/users.php';
    include_once '../../classes/admin.php';

    if(isset($_POST['submit'])){
      $admin_name = $_POST['admin_name'];
      //echo "Your name is". $admin_name;
      $admin_email = $_POST['admin_email'];
      $admin_phone = $_POST['admin_phone'];
      $admin_pass  = $_POST['admin_pass'];

      $admin_name = mysqli_real_escape_string($mysqli, $admin_name);
      $admin_email = mysqli_real_escape_string($mysqli, $admin_email);
      $admin_phone = mysqli_real_escape_string($mysqli, $admin_phone);
      $admin_pass = mysqli_real_escape_string($mysqli, $admin_pass);

      //print_r($_POST);
      //exit();

      $save = insert_admin($mysqli, $admin_name, $admin_email, $admin_phone, $admin_pass);
        if($save){
          echo '<script>
                alert("Admin Added successfully");
                window.location = "signin.php";
                </script>';
       }
    }

?>
  <?php
    include_once '../../includes/header.php';
    include_once '../../includes/navbar.php';
  ?>
  <!-- Custom styles for this template -->
<link href="../../dist/css/floating-labels.css" rel="stylesheet">
<body class="text-center">
    <form class="form-signin" action="<?php $_SERVER['PHP_SELF'] ?>" Method="POST">
        <div class="text-center mb-4">
        <!-- <img class="mb-4" src="#" alt="Akawo Daily Save" width="72" height="72"> -->
        <br><br><br><h1 class="h3 mb-3 font-weight-normal">Create Admin</h1>
        </div>
        <div class="form-label-group">
        <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Full Name" required autofocus>
        <label for="admin_name">Full Name</label>
      </div>
      <div class="form-label-group">
        <input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Email address" required autofocus>
        <label for="admin_email">Email address</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="admin_phone" id="admin_phone" class="form-control" placeholder="Phone Number" required autofocus>
        <label for="admin_phone">Phone Number</label>
      </div>      
      <div class="form-label-group">
        <input type="password" name="admin_pass" id="admin_pass" class="form-control" placeholder="Password" required>
        <label for="admin_pass">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button><br>
      <p class="mt-5 mb-3 text-muted text-center">&copy; www.akawo.com 2021 Project </p>
    </form>

</body>