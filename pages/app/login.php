<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles/style.css" />
  <title>Login</title>
</head>

<body>

  <?php

  include '../../config/dbcon.php';

  if (isset($_POST['submit'])) {

    $id = $_POST['credential'];

    $uniqueidsearch = "select farmeruniqueid from farmer_data where farmeruniqueid='$id'";
    $aadhaarsearch = "select  aaddhaarno from farmer_data where aaddhaarno='$id'";
    $phonenosearch = "select  phoneno from farmer_data where phoneno='$id'";
    $query1 = mysqli_query($con, $uniqueidsearch);
    $query2 = mysqli_query($con, $aadhaarsearch);
    $query3 = mysqli_query($con, $phonenosearch);

    $uniqueid_count = mysqli_num_rows($query1);
    $aadhaar_count = mysqli_num_rows($query2);
    $phoneno_count = mysqli_num_rows($query3);

    $_SESSION['id'] = $id;

    if ($uniqueid_count) {
  ?>
      <script>
        location.replace("./cards/cards.php")
      </script>
      <?php

    } else if ($aadhaar_count) {
      if ($aadhaar_count == 1) { ?>
        <script>
          location.replace("./cards/cards.php")
        </script>
      <?php
      } else { ?>
        <script>
          location.replace("./accounts/account.php")
        </script>
      <?php
      }
    } else if ($phoneno_count) {
      if ($phoneno_count == 1) { ?>
        <script>
          location.replace("./cards/cards.php")
        </script>
      <?php
      } else { ?>
        <script>
          location.replace("./accounts/account.php")
        </script>
      <?php
      }
    } else {
      ?>
      <script>
        alert("Invalid credentials")
      </script>
  <?php
    }
  }
  ?>
  <!-- .navbar start-->
  <div class="none">
    <header id="header" class="d-flex align-items-center header">
      <div class="container d-flex justify-content-between">
        <div class="logo mr-5">
          <a href=""><img src="../../img/logo2.png" alt="Pench Logo" class="img-fluid" style="margin-bottom: 14px" /></a><span class="dash notranslate">|</span><span class="title"> PENCH</span>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li>
              <a class="nav-link scrollto" href="privacy.html">About Us/Terms & conditions</a>
            </li>
            <li><a class="nav-link scrollto" href="">FAQ</a></li>
            <li>
              <a class="nav-link scrollto" href="">Contact Us</a>
            </li>
            <li>
              <a class="nav-link scrollto active" href="">Login</a>
            </li>
          </ul>
        </nav>
        <!-- .navbar end -->
      </div>
    </header>
  </div>
  <div class="d-flex justify-content-between mt-2">
    <div id="google_translate_element"></div>
  </div>
  <div class="container d-flex justify-content-center borderlg" style="margin-top: 19vh; width: 50%">
    <div class="row mt-5">
      <form class="form-inline" method="POST">
        <div class="form-group">
          <input type="text" placeholder="           Enter Login Detail" id="credential" name="credential" class="form-control" required autocomplete="off" aria-describedby="passwordHelpInline" />
          <small class="font-weight-light mt-2 text-primary d-flex justify-content-center">
            " Enter Aadhaar no. / Phone no. "
          </small>
          <small class="font-weight-light mt-1 text-primary d-flex justify-content-center">
            " Unique id "
          </small>
          <a><button type="submit" class="btn btn-primary mt-4 mb-5" style="background-color: #0aa1dd; width: 280px; font-weight: 500" name="submit">Login</button></a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/3d09e0901d.js" crossorigin="anonymous"></script>
  <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="app.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#credential").keyup(function() {
        var a = $("#credential").val().split(" ").join("").toUpperCase();
        $("#credential").val(a);
      });
    });
  </script>

</body>

</html>