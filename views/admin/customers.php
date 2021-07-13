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
    
    ?>
  <?php
      include_once "../../includes/header.php";
      include_once "../../includes/navbar.php"
      
  ?>
    <main role="main">

            <div class="container my-4">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><b>Customers Account Record</b></h3>
                        </div>
                    <?php
                    // Void Transaction Script Start here
        
                    if(isset($_GET['void'])){
                        $transaction_id = $_GET['tran_id'];
                        $void_res = select_ledger_by_id($mysqli, $transaction_id);
                        $void_row = mysqli_fetch_assoc($void_res);

                        $user_id = $void_row['user_id'];
                        $amount = $void_row['amount'];
                            if(isset($amount)){
                               $amount = $amount*-1;
                            }
                        //$transaction_type = $void_row['transaction_type'];
                        $transaction_no = $void_row['transaction_no'];
                        $description = $void_row['description'];
                        $date = date("Y-m-d");
                        // $status = 0;

                        insert_void_transaction($mysqli, $user_id, $amount, $transaction_no, $description, $date);
                            echo '<script>
                                    alert("Transaction Voided successfully");
                                    window.location="customers.php";
                                </script>';

                        // echo $user_id ."<br/>".$amount ."<br/>". $transaction_no;
                        // exit();
                    }
                    // Void Transaction Script Ends here
                ?>
                    <div class="card-body">
                        <div data-scrollable>
                        <div class="table-responsive">
                        <table class="table v-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Customer</th> 
                                    <th scope="col">Transaction Type</th>
                                    <th scope="col">Description</th>              
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>   
                                    <th scope="col" colspan="3">Action</th>
                                </tr>
                            </thead> 
                                <?php
                                    $cnt = 1;
                                    $result = select_ledger_record($mysqli);
                                    if(mysqli_num_rows($result)>0){
                                        while ($ledger_row = mysqli_fetch_assoc($result)) {
                                            $tran_id = $ledger_row['transaction_id'];
                                            $user_res = select_all_user_by_id($mysqli, $user_id = $ledger_row['user_id']);
                                                if(mysqli_num_rows($user_res)>0){
                                                    while ($user_row =mysqli_fetch_assoc($user_res)) {
                                                       $user_id = $user_row['user_id'];
                                                       $user_name = $user_row['user_name'];
                                                    }
                                                }
                                            
                                            $amount  = $ledger_row['amount'];
                                                        if($amount < 0){
                                                       $amount = $amount * -1;                                                        
                                                        }
                                            $tran_res = select_transaction_type_by_id($mysqli, $tran_type_id = $ledger_row['transaction_type']);
                                            if(mysqli_num_rows($tran_res)>0){
                                                while ($tran_row = mysqli_fetch_assoc($tran_res)) {
                                                    $tran_type_id = $tran_row['tran_type_id'];
                                                    $transaction_type = $tran_row['transaction_type'];                                                   
                                                }
                                            }
                                            $date = $ledger_row['date'];
                                            $description = $ledger_row['description'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $transaction_type;?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><a href="edit_trans.php?edit=1&tran_id=<?php echo $tran_id; ?>" class="btn btn-secondary">Edit</a></td>
                                                <td><a href="user_record.php?view=1&user_id=<?php echo $user_id; ?>" class="btn btn-primary">View</a></td>
                                                <td><a href="customers.php?void=1&tran_id=<?php echo $tran_id; ?>" class="btn btn-warning">Void</a></td>
                                            </tr>
                                         
                                        <?php
                                            $cnt ++;
                                        }
                                    }
                                ?>
                           </tbody>
                                    <?php $total = total_amount($mysqli);
                                        while ($total_row = mysqli_fetch_assoc($total)) {
                                            $total_amount = $total_row['total_amount'];
                                            //echo $amount;
                                        }
                                        
                                    ?>
                                <thead>
                                <tr  class="table-dark">
                                <th> </th> 
                                <th> </th>
                                <th> </th>
                                <th><b>Total</b></th>
                                <th colspan="4"><b><?php echo $total_amount ?></b> </th>
                                <th> </th>
                                </tr>
                                </thead>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
      

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


     <?php
        include "../../includes/footer.php";
     ?>