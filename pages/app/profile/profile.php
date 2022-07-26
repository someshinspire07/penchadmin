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

  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/profile.css" />
  <link rel="stylesheet" href="../styles/style.css" />
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
        <!-- readonly -->
      </div>
    </header>
  </div>
  <div class="d-flex justify-content-between mt-1">
    <div id="google_translate_element"></div>
  </div>
  <div class="container rounded bg-white">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="p-2">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile</h4>
            <div class="mb-3" onclick="history.back()">
              <small class="logs me-4 text-info "><i class="fa-solid fa-caret-left"></i> Back</small>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" readonly value="<?php echo $_SESSION['firstname']; ?>" />
            </div>
            <div class="col-md-6">
              <label class="labels">Surname</label><input type="text" class="form-control" readonly value="<?php echo $_SESSION['lastname']; ?>" placeholder="Raut" />
            </div>
          </div>
          <div class="row mt-3">
            <!-- <div class="col-md-12">
              <label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="89678767567" value="<?php echo $_SESSION['phoneno']; ?>" />
            </div> -->
            <div class="col-md-12">
              <label class="labels">Taluka</label><input type="text" class="form-control" readonly value="<?php echo $_SESSION['taluka']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">District</label><input type="text" class="form-control" readonly value="<?php echo $_SESSION['district']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">WUA Name</label><input type="text" class="form-control" readonly placeholder="WUA name" value="<?php echo $_SESSION['wuaname']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Name of section officer</label><input type="text" class="form-control" readonly placeholder="Section Officer name" value="<?php echo $_SESSION['nameofsection']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Mouja</label><input type="text" class="form-control" readonly value="<?php echo $_SESSION['mouja']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Survey no.</label><input type="text" class="form-control" readonly placeholder="Survey no." value="<?php echo $_SESSION['surveyno']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Unique Id</label><input type="text" class="form-control" readonly value="<?php echo $_SESSION['farmeruniqueid']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Canal</label><input type="text" class="form-control" readonly placeholder="Canal" value="<?php echo $_SESSION['nameofcanal']; ?>" />
            </div>
            <div class="col-md-12">
              <label class="labels">Outlet</label><input type="text" class="form-control" readonly placeholder="Outlet" value="<?php echo $_SESSION['nameofoutlet']; ?>" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="../app.js"></script>
  <script>
    function goBack() {
      history.back()
    }
  </script>
</body>

</html>