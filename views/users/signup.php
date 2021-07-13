<?php
    include_once '../../database_conn/db_connection.php';
    $mysqli = database_connect();

    include_once '../../classes/ledger.php';
    include_once '../../classes/users.php';
    include_once '../../classes/admin.php';

    if(isset($_POST['submit'])){
      $user_name = $_POST['user_name'];
      //echo "Your name is". $user_name;
      $user_email = $_POST['user_email'];
      $user_phone = $_POST['user_phone'];
      $user_pass = $_POST['user_pass'];

      //print_r($_POST);
      //exit();

      $save = insert_user($mysqli, $user_name, $user_email, $user_phone, $user_pass);
        if($save){
          echo '<script>
                alert("User Added successfully");
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
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        </div>
        <div class="form-label-group">
        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Full Name" required autofocus>
        <label for="user_name">Full Name</label>
      </div>
      <div class="form-label-group">
        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email address" required autofocus>
        <label for="user_email">Email address</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="user_phone" id="user_phone" class="form-control" placeholder="Phone Number" required autofocus>
        <label for="user_phone">Phone Number</label>
      </div>      
      <div class="form-label-group">
        <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Password" required>
        <label for="user_pass">Password</label>
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