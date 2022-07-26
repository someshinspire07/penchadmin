<?php

session_start();
if(!isset($_SESSION['id'])){
  header('location:../login.php');
}

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

  <?php

  include '../../../dbcon.php';

  $farmer_details = "select farmeruniqueid, mouja, firstname, lastname  from farmer_data where aadhaarno='{$_SESSION['id']}' or phoneno='{$_SESSION['id']}'";
  $query = mysqli_query($con, $farmer_details);

  ?>
  <!-- .navbar start -->
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
        <!-- .navbar end-->
      </div>
    </header>
  </div>
  <div class="container detail mt-4">
    <div class="d-flex justify-content-between">
      <div id="google_translate_element"></div>
      <a class="" style="text-decoration: none" href="../login.php"><button type="button" class="btn btn-secondary mb-2">
          <i class="fa-solid fa-circle-left"></i> Back
        </button></a>
    </div>
    <div class="container text-center blockquote mb-4 mt-2 h5 text-secondary">Select Account</div>
    <table class="table table-striped border-bottom">
      <thead>
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">Name</th>
          <th scope="col">Village</th>
          <th scope="col">UniqueID</th>
          <th scope="col">Account</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $count=0;
        while ($fetched_data = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <th scope="row"><?php echo ++$count ?></th>
            <td><?php echo  $fetched_data['firstname'] . " " . $fetched_data['lastname'] ?></td>
            <td><?php echo  $fetched_data['mouja'] ?></td>
            <td><?php echo  $fetched_data['farmeruniqueid'] ?></td>
            <td>
              <a class="btn btn-info buton" href="../cards/cards.php?id=<?php echo $fetched_data['farmeruniqueid']; ?>" role="button">Login</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <small class="font-weight-light mt-4 text-primary d-flex justify-content-center">
    " Click on 'Login' to enter into your account. "
  </small>

  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="../app.js"></script>
</body>

</html>