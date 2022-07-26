<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('location:../login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/bill.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    <title>Bill</title>
</head>

<body>
    <div class="none">
        <header id="header" class="d-flex align-items-center header">
            <div class="container d-flex justify-content-between">
                <div class="logo mr-5">
                    <a href=""><img src="../../../img/logo2.png" alt="Pench Logo" class="img-fluid" style="margin-bottom: 14px" /></a><span class="dash notranslate">|</span><span class="title"> PENCH</span>
                </div>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li>
                            <a class="nav-link scrollto" href="index.php#about">About Us</a>
                        </li>
                        <li><a class="nav-link scrollto" href="index.php#faq">FAQ</a></li>
                        <li>
                            <a class="nav-link scrollto" href="index.php#contact">Contact Us</a>
                        </li>
                        <li>
                            <a class="nav-link scrollto active" href="../logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </nav>
                <!-- .navbar -->
            </div>
        </header>
    </div>
    <div class="page-content container mt-2 mb-2">
        <div class="container px-0">
            <div class="row ">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <!-- <a class="d-flex flex-row-reverse mt-2 mb-2" style="text-decoration: none;" href="unpaid.php"><button type="button" class="btn btn-secondary mb-2 "> <i class="fa-solid fa-circle-left"></i> Back</button></a> -->


                        <div class="col-30">
                            <div class="text-left text-150">
                                <img src="../../../img/logor3.png" height="10%" ; width="10%" ; align="right" ;>
                                <img src="../../../img/logor1.jpg" height="10%" ; width="10%" ; align="left" ;>


                            </div>
                            <div class="text-center">
                                <span class="text-default-d3" style="font-size: 100%">कार्यालय<br>महाराष्ट्र शासन, जलसंपदा विभाग.<br>कार्यकारी अभियंता, पेंच पाटबंधारे विभाग, वैनगंगानगर अजनी,<br>नागपूर.<br>Email-eepidngp1@gmail.com, pongp@rediffmail.com<br>फोन नं. 0712-2980143, 2980144</span>
                            </div>
                        </div>

                    </div>
                    <!-- .row -->

                    <?php

                    include '../../../config/dbcon.php';
                    $ids = $_GET['id'];
                    $showquery = "SELECT * FROM farmer_data INNER JOIN bill_data ON bill_data.farmeruniqueid=farmer_data.farmeruniqueid WHERE bill_id='{$ids}';";
                    $showdata = mysqli_query($con, $showquery);
                    $arrdata = mysqli_fetch_array($showdata);


                    ?>

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">

                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Farmer Name:</span>
                                <span class="text-600 text-110 text-blue align-middle"><?php echo $arrdata['firstname']; ?> <?php echo $arrdata['lastname']; ?></span>
                            </div>
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Farmer ID:</span>
                                <span class="text-600 text-110 text-blue align-middle"><?php echo $arrdata['farmeruniqueid']; ?></span>
                            </div>
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Village:</span>
                                <span class="text-600 text-110 text-blue align-middle"><?php echo $arrdata['mouja']; ?></span>
                            </div>
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Subdivision:</span>
                                <span class="text-600 text-110 text-blue align-middle"><?php echo $arrdata['nameofsubdivision']; ?></span>
                            </div>




                        </div>


                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">

                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice Water Bill

                                </div>
                                <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                    <span class="text-600 text-90">Bill ID: </span><?php echo $arrdata['bill_id']; ?>


                                    <div class="my-2">
                                        <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                        <span class="text-600 text-90">Issue Date: </span><?php echo $arrdata['date']; ?>


                                        <div class="my-2">
                                            <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                            <span class="text-600 text-90">Season: </span><?php echo $arrdata['season']; ?>
                                        </div>
                                    </div>


                                    <!-- <div class="my-2">
                  <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                  <span class="text-600 text-90">Total Area : </span><?php echo $arrdata['totalarea']; ?>
                </div> -->
                                </div>
                                <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                    <span class="text-600 text-90">Irrigated Area: </span><?php echo $arrdata['irrigatedarea']; ?>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
                <div class="container">
                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            <div class="col-9 col-sm-5">Description</div>
                            <div class="col-2">Amount</div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="col-9 col-sm-5">Total Bill Amount</div>
                            <div class="col-3 text-secondary-d2">&#8377;<?php echo $arrdata['total_amount']; ?>
                            </div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="col-9 col-sm-5">Pending Amount</div>
                            <div class="col-3 text-secondary-d2">&#8377;<?php echo $arrdata['pending_amount']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row border-b-2 brc-default-l2"></div>

                <div class="row mt-3">


                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">


                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                            <div class="col-7 text-right">Amount to pay</div>
                            <div class="col-5 mb-1">
                                <span class="text-150 text-success-d3 opacity-2">&#8377;<?php echo $arrdata['pending_amount']; ?>
                            </div></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <?php

        if ($arrdata['pending_amount'] != 0) {
        ?>
            <div class="container mb-1">
                <div class="row justify-content-around">
                    <div class="col d-flex"><input type='number' required name='amount' id="payable_amount" onkeyup="change()" class='form-control price col'> <i class="fa-solid fa-pencil mt-2"></i></div>
                    <div class="col"><button id="rzp-button1" class=" btn btn-info btn-bold px-4 float-right mt-0.5 mt-lg-0">Pay
                            Now</button></div>
                </div>
            </div>
        <?php
        }
        ?>
        <span class="text-secondary-d1 text-105">Goverment of Maharashtra</span>
        <br>
        <br>
    </div>
    
    <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script src="../app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js">
    </script>
    <script>
        document.getElementById('payable_amount').defaultValue = '<?php echo $arrdata['pending_amount']; ?>';
        amount = document.getElementById('payable_amount').defaultValue;
        let pending_amount = '<?php echo $arrdata['pending_amount']; ?>'
        var options = {
            "key": "rzp_test_6zruK8d2lOB0Fc", // Enter the Key ID generated from the Dashboard - API key
            "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Pench Patbandhare", // Name
            "description": "Test Transaction",
            "image": "../../../img/logo2.png", // logo image
            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                $.post('paymentAPI.php', {
                    data: response.razorpay_payment_id,
                    date: '<?php date_default_timezone_set('Asia/Kolkata');
                            echo date('d-m-y'); ?>',
                    time: '<?php date_default_timezone_set('Asia/Kolkata');
                            echo date('h:i A'); ?>',
                    farmer_id: '<?php echo $arrdata['farmeruniqueid'] ?>',
                    bill_id: '<?php echo $arrdata['bill_id'] ?>',
                    amount: amount,
                    pending_amount: pending_amount - amount
                }, function(data) {

                    alert('Payment Successful!');
                    const myArray = data.split(".");
                    const pendingAmt = parseInt(myArray[1]);
                    if (pendingAmt == 0) {
                        location.replace("receipt.php?id=" + myArray[2]);
                    } else {
                        location.replace("trans_receipt.php?id=" + myArray[0]);
                    }
                });
            },
            "prefill": {
                "name": '<?php echo $arrdata['firstname'] . " " . $arrdata['lastname'] ?>',
                "email": '<?php echo $arrdata['email'] ?>',
                "contact": "<?php echo $arrdata['phoneno'] ?>",
            },
            "theme": {
                "color": "#0aa1dd"
            }

        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert("Payment Failed! ", response.error.description);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }

        function change() {
            let amount = parseInt(document.getElementById('payable_amount').value);
            if (Number(amount) > Number(document.getElementById('payable_amount').defaultValue)) {
                document.getElementById('payable_amount').value = '<?php echo $arrdata['pending_amount']; ?>';
                amount = parseInt('<?php echo $arrdata['pending_amount']; ?>');
            }
            if (amount == 0) {
                amount = parseInt('<?php echo $arrdata['pending_amount']; ?>');
            }

            var options = {
                "key": "rzp_test_6zruK8d2lOB0Fc", // Enter the Key ID generated from the Dashboard - API key
                "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Pench Patbandhare", // Name
                "description": "Test Transaction",
                "image": "../../../img/logo2.png", // logo image
                //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function(response) {
                    $.post('paymentAPI.php', {
                        data: response.razorpay_payment_id,
                        farmer_id: '<?php echo $arrdata['farmeruniqueid'] ?>',
                        bill_id: '<?php echo $arrdata['bill_id'] ?>',
                        date: '<?php date_default_timezone_set('Asia/Kolkata');
                                echo date('d-m-y'); ?>',
                        time: '<?php date_default_timezone_set('Asia/Kolkata'); echo date('h:i A'); ?>',
                        amount: amount,
                        pending_amount: pending_amount - amount,
                    }, function(data) {

                        alert('Payment Successful!');
                        const myArray = data.split(".");
                        const pendingAmt = parseInt(myArray[1]);
                        if (pendingAmt == 0) {
                            location.replace("receipt.php?id=" + myArray[2]);
                        } else {
                            location.replace("trans_receipt.php?id=" + myArray[0]);
                        }

                    });
                },
                "prefill": {
                    "name": '<?php echo $arrdata['firstname'] . " " . $arrdata['lastname'] ?>',
                    "email": '<?php echo $arrdata['email'] ?>',
                    "contact": "<?php echo $arrdata['phoneno'] ?>",
                },
                "theme": {
                    "color": "#0aa1dd"
                }

            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function(response) {
                alert("Payment Failed! ", response.error.description);
            });
            document.getElementById('rzp-button1').onclick = function(e) {
                rzp1.open();
                e.preventDefault();
            }
        }
    </script>
    <script>
        location.reload();
        return;
    </script>


</body>

</html>