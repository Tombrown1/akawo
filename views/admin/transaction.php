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
        include_once '../../classes/transaction.php';
        
        if(isset($_POST['submit'])){
            $user_id = $_POST['user_id'];
            $amount  = $_POST['amount'];
            $transaction_type = $_POST['tran_type_id'];
                if($transaction_type == 2){
                    $amount = $amount * -1;
                }
            $description = $_POST['description'];
            $date = $_POST['date'];
            
            //create safe values for input into the database
            $user_id = mysqli_real_escape_string($mysqli, $user_id);
            $amount  = mysqli_real_escape_string($mysqli, $amount);
            $transaction_type = mysqli_real_escape_string($mysqli, $transaction_type);
            $description = mysqli_real_escape_string($mysqli, $description);
            $transaction_no = uniqid('TN');   
            $date = mysqli_real_escape_string($mysqli, $date);
            
        $ledger_save = insert_ledger($mysqli,$user_id, $amount, $transaction_type, $description, $transaction_no, $date);
            if($ledger_save){
                echo '<script>
                        alert("Record saved successfully");
                        window.location = "customers.php";
                    </script>';
            }
        }
    ?>
  <?php
      include_once "../../includes/header.php";
      include_once "../../includes/navbar.php";
  ?>

        <main role="main">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <br> <h3>Deposit/Withdrawal Transaction</h3><br><br>
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="form-group">                                
                                <label for="user_id">Customer Name</label><br>
                               <select name="user_id" class="form-control">
                               <option value="">Select Customer</option>
                               <?php
                                    $result = select_all_users($mysqli);
                                    if(mysqli_num_rows($result)>0){
                                        while ($user_row = mysqli_fetch_assoc($result)){
                                           $user_id = $user_row['user_id'];
                                           $user_name = $user_row['user_name'];
                                    ?>
                                    <option value="<?php echo $user_id ?>"><?php echo $user_name?></option>
                                    <?php
                                        }
                                    }
                                ?>
                                   
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" data-type="currency" name="amount" class="form-control" placeholder="Amount">
                            </div>
                            <div class="form-group">
                                <label for="tran_type_id">Transaction Type</label><br>
                               <select name="tran_type_id" class="form-control">
                                   <option value="">Select Transaction</option>
                                   <?php
                                        $result = select_transaction($mysqli);
                                        if(mysqli_num_rows($result)>0){
                                            while ($tran_row = mysqli_fetch_assoc($result)){
                                                $tran_type_id = $tran_row['tran_type_id'];
                                                $transaction_type = $tran_row['transaction_type'];
                                            ?>
                                            <option value="<?php echo $tran_type_id ?>"> <?php echo $transaction_type ?></option>
                                            <?php
                                            }
                                        }
                                   ?>
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" cols="5" rows="2" name="description" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" class="form-control" placeholder="Date">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

       <hr class="featurette-divider">
      </div><!-- /.container -->


     <?php
        include "../../includes/footer.php";
     ?>