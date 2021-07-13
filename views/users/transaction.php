<?php
require_once '../../database_conn/db_connection.php';
    $mysqli = database_connect();
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: signin.php");
        exit();
    }

    include_once '../../classes/ledger.php';
    include_once '../../classes/users.php';
    include_once '../../classes/admin.php';
    include_once '../../classes/transaction.php';
?>
<?php 
    include_once '../../includes/header.php';
    include_once '../../includes/navbar.php'; 
?>

<?php
     // Script for viewing of user record from user ends begins here 
     if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $result = select_all_user_by_id($mysqli, $user_id);
        $user_row = mysqli_fetch_assoc($result);
        $username = $user_row['user_name'];
     }
?>
 <!-- <link rel="stylesheet" href="../../dist/css/panel.css"> -->

 <main role="main">
        <div class="container my-4">       
           <div class="col-md-4 col-md-8 mb-4">
                <div class="card">
                        <div class="card-header">
                            <h4 class="card-primary" align="right"><?php echo $username." Transaction Record"; ?></h4>
                        </div>                        
                    <div class="card-body">
                        <div class="table-reponsive">
                            <table class="table v-middle">
                                <thead>
                                    <tr>
                                    <th>S/N</th>
                                    <th>Transaction Type</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th> Date</th>                          
                                    </tr>
                                </thead>
                            <?php
                            $cnt = 1;
                            $result = get_all_by_user_id($mysqli, $user_id);
                                if(mysqli_num_rows($result)>0){
                                    while ($user_rec = mysqli_fetch_assoc($result)) {
                                        $tran_type = select_transaction_type_by_id($mysqli, $tran_type_id = $user_rec['transaction_type']);
                                        while ($tran_row = mysqli_fetch_assoc($tran_type)) {
                                            $transaction_type = $tran_row['transaction_type'];
                                        }
                                        ?>
                                        
                                 <tbody>
                                <!-- User_id from ledger table; -->
                                <?php $user_acnt_id = $user_rec['user_id']; ?>
                                <tr>
                                <td><?php echo $cnt ?></td>
                                <td><?php echo $transaction_type; ?></td>
                                <td><?php echo $user_rec['description'] ?></td>
                                <td><?php $amount = $user_rec['amount'];
                                    if($amount<0){
                                        $amount = $amount*-1;
                                    }else{
                                       // echo $amount;
                                    } 
                                    echo $amount;
                                ?></td>
                                <td><?php echo $user_rec['date'] ?></td>
                                </tr>
                                     
                                </tbody> 
                                <?php
                                $cnt ++;
                                    }
                                }
                                
                                ?>
                                                               
                                <thead>
                            <?php
                                $user_bal_res = user_acnt_balance($mysqli, $user_id = $user_acnt_id);
                                while ($bal_row = mysqli_fetch_assoc($user_bal_res)) {
                                 $user_balance = $bal_row['user_banlance'];
                                }
                            ?>
                                    <tr>
                                    <th></th>
                                    <th></th>
                                    <th><b><b>Acount Balance</b></b></th>
                                    <th> <b><?php echo $user_balance;?></b></th>                          
                                    </tr>
                                </thead>
                            </table>
                            <div class="card-footer"align="right" >
                               <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                               <a href="#" class="btn btn-danger" align="right">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>

       <hr class="featurette-divider">
      </div><!-- /.container -->












<?php   
     include "../../includes/footer.php"; 
?>