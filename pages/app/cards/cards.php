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
  <title>Pench</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/cards.css" />
  <link rel="stylesheet" href="../styles/style.css" />
</head>

<body>
  <?php

  include '../../../config/dbcon.php';

  if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $_SESSION['farmeruniqueid'] = $id;
    $farmer_data = "select firstname, lastname from farmer_data where farmeruniqueid='$id'";
    $query = mysqli_query($con, $farmer_data);
    $fetched_data = mysqli_fetch_assoc($query);
  } else {

    $farmer_data = "select * from farmer_data where farmeruniqueid='{$_SESSION['id']}' or aaddhaarno='{$_SESSION['id']}' or phoneno='{$_SESSION['id']}'";
    $query = mysqli_query($con, $farmer_data);
    $fetched_data = mysqli_fetch_assoc($query);
    $_SESSION['farmeruniqueid'] = $fetched_data['farmeruniqueid'];
    $_SESSION['firstname'] = $fetched_data['firstname'];
    $_SESSION['lastname'] = $fetched_data['lastname'];
    $_SESSION['phoneno'] = $fetched_data['phoneno'];
    $_SESSION['taluka'] = $fetched_data['taluka'];
    $_SESSION['district'] = $fetched_data['district'];
    $_SESSION['wuaname'] = $fetched_data['wuaname'];
    $_SESSION['mouja'] = $fetched_data['mouja'];
    $_SESSION['surveyno'] = $fetched_data['surveyno'];
    $_SESSION['nameofcanal'] = $fetched_data['nameofcanal'];
    $_SESSION['nameofoutlet'] = $fetched_data['nameofoutlet'];
  }

  ?>
  <!-- navbar start -->
  <div class="none">
    <header id="header" class="d-flex align-items-center header">
      <div class="container d-flex justify-content-between">
        <div class="logo mr-5">
          <a href=""><img src="../../../img/logo2.png" alt="Pench Logo" class="img-fluid" style="margin-bottom: 24.5px" /></a><span class="dash notranslate">|</span><span class="title"> PENCH</span>
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
        <!-- .navbar end -->
      </div>
    </header>
  </div>
  <div class=" d-flex justify-content-between mt-1">
    <div id="google_translate_element"></div>
    <a href="../logout.php" style="text-decoration:none;font-size:13px;" class="mt-1"><small class="logs me-4 text-info ">Logout <i class="fa-solid fa-right-from-bracket"></i></small></a>
  </div>

  <div class="welcome">Welcome: <span class="name"><?php echo $fetched_data['firstname'] . " " . $fetched_data['lastname'] ?></span></div>
  <div class="br"></div>
  <div class="container">
    <div class="cards">
      <a href="../profile/profile.php" style="text-decoration: none;">
        <div class="card">
          <i class="fa-solid fa-user icons" style="margin-bottom: 12px"> </i>View Profile
        </div>
      </a>
      <a href="../bill/unpaid.php" style="text-decoration: none;">
        <div class="card">
          <i class="fa-solid fa-money-bill-wheat icons" style="margin-bottom: 12px"></i>View/Pay Bill
        </div>
      </a>
      <a href="../bill/pending.php" style="text-decoration: none;">
        <div class="card"><i class="fa-solid fa-money-bills icons" style="margin-bottom: 12px"></i>Pending Bill</div>
      </a>
      <a href="../bill/paid.php" style="text-decoration: none;">
        <div class="card">
          <i class="fa-solid fa-clock-rotate-left icons" style="margin-bottom: 12px"></i>Paid Bill
        </div>
      </a>
      <a href="../bill/transaction.php" style="text-decoration: none;">
        <div class="card"><i class="fa-solid fa-arrow-right-arrow-left icons" style="margin-bottom: 12px"></i>Transactions</div>
      </a>
      <a href="../privacy.html" style="text-decoration: none;">
      <div class="card">
        <i class="fa-solid fa-mobile-screen-button icons" style="margin-bottom: 12px"></i>Contact
      </div>
      </a>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="../app.js"></script>
</body>

</html>