<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('location:../login.php');
}

?>

<?php

include '../../../config/dbcon.php';
$farmerid = $_SESSION['farmeruniqueid'];
$selectquery = "select * from bill_data where farmeruniqueid = '$farmerid' && status = 'UNPAID'";
$query = mysqli_query($con, $selectquery);
$num = mysqli_num_rows($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../styles/bill.css" />
  <link rel="stylesheet" href="../styles/style.css" />
  <title>Unpaid Bills</title>
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
  <div class="container detail mt-4">
    <div class="d-flex justify-content-between">
      <div id="google_translate_element"></div>
      <div class="mt-1" onclick="history.back()">
        <small class="logs me-4 text-info "><i class="fa-solid fa-caret-left"></i> Back</small>
      </div>
    </div>
    <table class="table table-striped border-bottom">
      <thead>
        <tr>
          <th scope="col">Bill ID</th>
          <th scope="col">Season</th>
          <th scope="col">Year</th>
          <th scope="col">Status</th>
          <th scope="col">Bill</th>
        </tr>
      </thead>
      <tbody>
        <?php

        while ($res = mysqli_fetch_array($query)) {

        ?>
          <tr>
            <th scope="row"><?php echo $res['bill_id']; ?></th>
            <td><?php echo $res['season']; ?></td>
            <td><?php echo $res['year']; ?></td>
            <td><?php echo $res['status']; ?></td>
            <td>
              <a class="btn btn-info buton" href="bill.php?id=<?php echo $res['bill_id']; ?>" data-toggle="tooltip" data-placement="top" title="Your Bill" role="button">Pay</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php
  if ($num > 0) {
  ?>
    <small class="font-weight-light mt-4 text-primary d-flex justify-content-center">
      " Click on 'Pay' to view and pay the bill. "
    </small>
  <?php
  } else {
  ?>
    <small class="font-weight-light mt-5 text-primary d-flex justify-content-center">
      " No bills to show "
    </small>

  <?php
  }
  ?>

  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="../app.js"></script>

</body>

</html>