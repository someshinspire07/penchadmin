<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:../../index.php');
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
  <link rel="stylesheet" href="../app/styles/bill.css" />
  <link rel="stylesheet" href="../app/styles/style.css" />
  <title>Receipt</title>
</head>

<body>
  <div class="none">
    <header id="header" class="d-flex align-items-center header">
      <div class="container d-flex justify-content-between">

        <nav id="navbar" class="navbar">
          <ul>

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
                <img src="../../img/logo2.png" height="10%" ; width="10%" ; align="left" ;>
                <img src="../../img/logo4.jpg" height="10%" ; width="10%" ; align="right" ;>

              </div>
              <div class="text-center">
                <span class="text-default-d3" style="font-size: 100%">कार्यालय<br>महाराष्ट्र शासन, जलसंपदा विभाग.<br>कार्यकारी अभियंता, पेंच पाटबंधारे विभाग, वैनगंगानगर अजनी,<br>नागपूर.<br>Email-eepidngp1@gmail.com, pongp@rediffmail.com<br>फोन नं. 0712-2980143, 2980144</span>
              </div>
            </div>

          </div>
          <!-- .row -->

          <?php

          include '../../config/dbcon.php';
          $ids = $_GET['id'];

          $showquery = "select * from bill_data,farmer_data where bill_id ='{$ids}'";
          $showdata = mysqli_query($con, $showquery);
          $arrdata = mysqli_fetch_array($showdata);

          $transquery = "select * from transaction_data where bill_id='{$ids}'";
          $transdata = mysqli_query($con, $transquery);


          ?>

          <hr class="row brc-default-l1 mx-n1 mb-4" />

          <div class="row">
            <div class="col-sm-6">
              <div>
                <span class="text-sm text-grey-m2 align-middle">Farmer Name:</span>
                <span class="text-600 text-110 text-blue align-middle"><?php echo $arrdata['firstname']; ?> <?php echo $arrdata['middlename']; ?> <?php echo $arrdata['lastname']; ?></span>
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


            <div class="text-95 col-sm-6 d-sm-flex justify-content-end">
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
                      <span class="text-600 text-90">Season:</span>
                      <?php echo $arrdata['season']; ?>
                    </div>
                  </div>
                  <!-- <div class="my-2">
                  <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                  <span class="text-600 text-90">Total Area : </span><?php echo $arrdata['totalarea']; ?>
                </div> -->

                  <div class="my-2">
                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                    <span class="text-600 text-90">Irrigated Area: </span><?php echo $arrdata['irrigatedarea']; ?>
                  </div>
                  <div class="my-2">
                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                    <span class="text-600 text-90">Status: </span><span style="font-weight:900;font-family: monospace; color:#108f30"><?php echo $arrdata['status']; ?></span>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="text-95 col-sm-16  justify-content-right">

              <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                Transaction Details

              </div>
              <?php
              while ($transarr = mysqli_fetch_array($transdata)) {

              ?>
                <div>
                <span class="text-600 text-90 text-grey-m2">Paid: &#8377; </span><?php echo $transarr['amount_paid'] . " on " . $transarr['trans_date'] . ", " . $transarr['trans_time'] . " " . "[" . $transarr['mode'] . "]"; ?>                </div>

              <?php
              }
              ?>


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
              <div class="col-9 col-sm-5">Water Charges</div>
              <div class="col-3 text-secondary-d2">&#8377;<?php echo $arrdata['amount']; ?>
              </div>
            </div>
            <?php
            if ($arrdata['outstanding_amount'] > 0) {
            ?>
              <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                <div class="col-9 col-sm-5">Outstanding Amount</div>
                <div class="col-3 text-secondary-d2">&#8377;<?php echo $arrdata['outstanding_amount']; ?>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row border-b-2 brc-default-l2"></div>

        <div class="row mt-1">
          <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
            <div class="row align-items-center bgc-primary-l3 p-2">
              <div class="col-7 text-right">Total Amount</div>
              <div class="col-5 ">
                <span class="text-150 text-success-d3 opacity-2">&#8377;<?php echo $arrdata['total_amount']; ?>
              </div></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr />
    <div class="container d-flex">
      <a href="#" class="btn btn-success btn-bold px-2 float-right mt-0.5 mt-lg-0" style="margin-left: 10px;margin-right: 8px;">Paid: <?php echo $arrdata['total_amount']; ?> &nbsp; <i class="fa-solid fa-check-double"></i></a>
      <div style="margin-top: 6px;">
        <span class="text-secondary-d1 text-105">Goverment of Maharashtra</span>
      </div>
    </div>
    <br>
    <br>
  </div>
  </div>
  </div>
  </div>
  <div class="col-1 mb-1 " style="margin : auto;" onclick="window.print()">
    <a class="btn bg-white btn-light text-95" href="#" data-title="Print">
      <i class="mr-1 fa fa-print text-primary-m1 text-120 w-1"></i>
      Print
    </a>
  </div>
  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>


</html>