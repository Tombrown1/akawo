<?php
    session_start();
    include_once '../../database_conn/db_connection.php';
    $mysqli = database_connect();

    include_once '../../classes/ledger.php';
    include_once '../../classes/users.php';
    include_once '../../classes/admin.php';

      if(isset($_POST['login'])){
        $admin_email = $_POST['admin_email'];
        $admin_pass  = $_POST['admin_pass'];

        //create safe values for input into the database
        $admin_email = mysqli_real_escape_string($mysqli, $admin_email);
        $admin_pass = mysqli_real_escape_string($mysqli, $admin_pass);

    $result = admin_login($mysqli, $admin_email, $admin_pass);
        if(mysqli_num_rows($result)>0){
          while ($admin_row = mysqli_fetch_assoc($result)) {
            $_SESSION['admin_id']   = $admin_row['admin_id'];
            $_SESSION['admin_name'] = $admin_row['admin_name'];            
          }
          header("Location: home.php?login=Success");
        }else{
          header("Location: signin.php?login=Error");
        }
      }
?>
  <?php
    include_once '../../includes/header.php';
    include_once '../../includes/navbar.php';
  ?>
  <!-- Custom styles for this template -->
   <link href="../../dist/css/signin.css" rel="stylesheet">
</html>
<body class="text-center">
    <form class="form-signin" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="text-center mb-4">
        <img class="mb-4" src="#" alt="Akawo Daily Save" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Akawo Daily Save</h1>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        </div>
        <div class="form-label-group">
            <label for="admin_email" class="sr-only">Email address</label>
            <input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Email address" required autofocus> <br>
        </div>
        <div class="form-label-group">
            <label for="admin_pass" class="sr-only">Password</label>
        <input type="password" name="admin_pass" id="admin_pass" class="form-control" placeholder="Password" required>
        </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Akawo 2021 Project</p>
    </form>
  </body>
   