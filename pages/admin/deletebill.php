<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:../../index.php');
}
?>

<?php
include '../../config/dbcon.php';

    $billid=$_GET['id'];

    $selectquery = "select * from bill_data where bill_id='$billid' ";
    $query = mysqli_query($con, $selectquery);
    $arrdata = mysqli_fetch_array($query);

    $farmerid= $arrdata['farmeruniqueid'];

    $query ="delete from bill_data where bill_id='$billid'";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
    ?>
    <script> alert("Bill deleted sucessfully"); 
    
    </script>
   
    <?php
    }
    else
    {
        ?>
        <script> alert("Bill not deleted sucessfully"); </script>
        <?php
    }

   ?>
    <script>
        history.back();
    </script>

   <?php


?>

