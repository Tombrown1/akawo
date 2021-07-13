  <!-- Navbar Page
      ================================================== -->
    <?php
      if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])){
            if(!isset($_SESSION['user_id'])){
             ?>
                     <!--============= Menu When Admin id is set; Log Admin in ==============-->
          <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="#">Akawo Save Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="transaction.php">Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customers.php">Customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add New customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Create Admin</a>
            </li>
          </ul>    
          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
          </form> -->
          <ul class="navbar-nav ml-auto mb-2 mb-md-0"> 
          <li class="nav-item">            
              <a class="nav-link active">  <?php
                  if(isset($_SESSION['admin_name'])){
                    echo "Welcome ". $_SESSION['admin_name'];
                  }
              ?></a>
            </li>         
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign out</a> 
            </li>
          </ul>  
        </div>
      </nav>
    </header>
          <?php    
            }else{
            ?>
                   <!--============= Menu When User id is set; Log user in ==============-->
          <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="#">Akawo Save User</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaction.php">Transaction</a>
            </li>
          </ul>    
          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
          </form> -->
          <ul class="navbar-nav ml-auto mb-2 mb-md-0"> 
          <li class="nav-item">            
              <a class="nav-link active">  <?php
                  if(isset($_SESSION['user_name'])){
                    echo "Welcome ". $_SESSION['user_name'];
                  }
              ?></a>
            </li>         
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign out</a> 
            </li>
          </ul>  
        </div>
      </nav>
    </header>
         <?php     
            }
      ?>
     
      <?php  
      }else{
      ?>
        <!--============= Menu When User id is not set; Log user out ==============-->
        <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a class="navbar-brand" href="index.php">Akawo Save</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul> -->
          <ul class="navbar-nav ml-auto mb-2 mb-md-0">
          <li class="nav-item">
              <a class="nav-link" href="signin.php">Login</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="signup.php">Signup</a>  -->
            </li>
          </ul>
        </div>
      </nav>
    </header>
      <?php
      }
    ?>