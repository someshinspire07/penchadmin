<?php
session_start();
include '../../../config/dbcon.php';


if (isset($_POST['data'])) {
    $payment_id = $_POST['data'];
    $bill_id = $_POST['bill_id'];
    $payment_date = $_POST['date'];
    $amount_paid = $_POST['amount'];
    $uid = $_POST['farmer_id'];
    $pending_amount = $_POST['pending_amount'];
    $payment_time = $_POST['time'];
    $insertquery = "INSERT INTO `transaction_data`(`farmeruniqueid`, `bill_id`, `amount_paid`, `mode`, `trans_date`, `trans_id`, `amt_pndng_on_date`,`trans_time`) VALUES ('$uid','$bill_id','$amount_paid','Online','$payment_date','$payment_id','$pending_amount','$payment_time')";
    mysqli_query($con, $insertquery);
    if ($pending_amount == 0) {
        $Status = 'PAID';
        $updatequery = "UPDATE `bill_data` SET `pending_amount`='$pending_amount', `status`='$Status',`final_pay_date`='$payment_date' where `bill_id` = '$bill_id'";
        mysqli_query($con, $updatequery);
        echo $payment_id . "." . $pending_amount . "." . $bill_id;
    } else {
        $Status = 'PENDING';
        $updatequery = "UPDATE `bill_data` SET `pending_amount`='$pending_amount', `status`='$Status' where `bill_id` = '$bill_id'";
        mysqli_query($con, $updatequery);
        echo $payment_id . "." . $pending_amount . "." . $bill_id;
    }
}
