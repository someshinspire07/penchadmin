<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>new_entry</title>
  <style>
    label {
      display: inline-block;
      width: 142px;
    }
  </style>
  <!-- Bootstrap core CSS-->
  <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom fonts for this template-->
  <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Page level plugin CSS-->
  <link href="../../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="../../style/assets/css/sb-admin.css" rel="stylesheet" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../../index.html">Add Farmer</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link  " href="wua_section.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>

        </li>


        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Farmer">
          <a class="nav-link " href="farmer_data.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-address-card-o"></i>
            <span class="nav-link-text">Farmer</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pending Bills">
          <a class="nav-link " href="pendingbill.php" data-parent="#exampleAccordion">
            <i class="fa fa-credit-card"></i>
            <span class="nav-link-text">Pending Bills</span>
          </a>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Farmer Data">
          <a class="nav-link" href="paidbills.php" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Paid Bills</span>
          </a>
        </li>



      </ul>
      <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>
      </ul>
    </div>

  </nav>

  <!-- This Page  -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <form method="POST">
        <form action="#" name="form1">
          <div class="form-group row">
            <label for="inputfirstname" class="col-sm-2 col-form-label ml-4 mt-4">First Name</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4 name" id="name" name="firstname" required />
              <span id="spamname" class="spamname" style="color: red"> </span>
            </div>
            <label for="inputmiddlename" class="col-sm-2 col-form-label ml-4 mt-4">Middle Name</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4 name" id="txtmiddleName" name="middlename" required />
              <span id="Error" class="spamname" style="color: red"></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputlastname" class="col-sm-2 col-form-label ml-4 mt-4">Last Name</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4 name" id="txtlastName" name="lastname" required />
              <span id="Error" class="spamname" style="color: red"></span>
            </div>
            <label for="inputmobile" class="col-sm-2 col-form-label ml-4 mt-4">Mobile</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4" id="inputmobile" maxlength="10" onkeypress="return onlyNumberKey(event)" name="phoneno" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="inputarea" class="col-sm-2 col-form-label ml-4 mt-4">Pancard no.</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4 uname" id="inputarea" maxlength="10" name="pancardno" required />
            </div>
            <label for="inputaadhar" class="col-sm-2 col-form-label ml-4 mt-4">Aadhar no.</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4" id="inputaadhar" onkeypress="return onlyNumberKey(event)" maxlength="12" name="aaddhaarno" required />
            </div>
          </div>

          <div class="form-group row"></div>

          <div class="form-group row"></div>
          <hr />

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label ml-4 mt-4">Email</label>
            <div class="col-sm-6">
              <input type="email" autocomplete="off" class="form-control mt-4" id="email" name="email" />
              <span id="emailMsg"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="Address" class="col-sm-2 col-form-label ml-4 mt-4">Address</label>
            <div class="col-sm-6">
              <input type="text" autocomplete="off" class="form-control mt-4" id="Address" name="Address" />
            </div>
          </div>

          <div class="form-group row">
            <label for="inputmouja" class="col-sm-2 col-form-label ml-4 mt-4">Mouja</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" id="first" class="form-control mt-4 name" id="txtmouja" name="mouja" required />
              <span id="Error" class="spamname" style="color: red"></span>
            </div>
            <label for="inputtaluka" class="col-sm-2 col-form-label ml-4 mt-4">Taluka</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control mt-4 name" id="txttaluka" name="taluka" required />
              <span id="Error" class="spamname" style="color: red"></span>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputdistrict" class="col-sm-2 col-form-label ml-4">District</label>
            <div class="col-sm-3">
              <input type="text" autocomplete="off" class="form-control name" id="txtdistrict" name="district" required />
              <span id="Error" class="spamname" style="color: red"></span>
            </div>
          </div>
          <hr />
          <div class="form-group row">
            <label for="surveyno" class="col-sm-2 col-form-label ml-4 mt-4">Survey No</label>
            <div class="col-sm-3">
              <input type="text" id="second" autocomplete="off" placeholder="use '/' for Survey ID" class="form-control mt-4" name="surveyno" required />

            </div>
            <label for="area" class="col-sm-2 col-form-label ml-4 mt-4">Total Area</label>
            <div class="col-sm-3">
              <input type="number" class="form-control mt-4" autocomplete="off" id="area" name="totalarea" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="nameofsub" class="col-sm-2 col-form-label ml-4 mt-4">Name of Subdivision</label>
            <div class="col-sm-3">
              <select class="form-control mt-4" id="nameofsub" name="nameofsub" required>
                <option value="Tekadi">Tekadi</option>
              </select>
            </div>
            <label for="nameoff" class="col-sm-2 col-form-label ml-4 mt-4">Name of Section Officer</label>
            <div class="col-sm-3">
              <select class="form-control mt-4" id="nameoff" name="nameofsection" required>
                <option value="Ranu&nbsp;Gawali&nbsp;Maam">Ranu Gawali ma'am</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="canalname" class="col-sm-2 col-form-label ml-4 mt-4">Name Of Canal</label>
            <div class="col-sm-3">
              <select class="form-control mt-4" id="nameoff" name="nameofcanal" required>
                <option value="Main&nbsp;Canal">Main Canal</option>
                <option value="Branch&nbsp;Canal">Branch Canal</option>
                <option value="Sub&nbsp;Branch&nbsp;Canal">Sub-Branch Canal</option>
                <option value="Division&nbsp;Canal">Division Canal</option>
                <option value="Minor&nbsp;Canal">Minor Canal</option>
                <option value="SubMinor&nbsp;Canal">Sub-Minor Canal</option>
              </select>
            </div>
            <label for="outlet" class="col-sm-2 col-form-label ml-4 mt-4">Name Of Outlet</label>
            <div class="col-sm-3">
              <select class="form-control mt-4" id="outlet" name="nameofoutlet" required>
                <option value="Sub&nbsp;Minor&nbsp;Canal">Sub-Minor Canal</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputmobile" class="col-sm-2 col-form-label ml-4 mt-4">Water User Association (WUA)</label>
            <div class="col-sm-3">
              <input type="text" readonly class="form-control mt-4" id="wua" name="wua" value="Tekadi" autocomplete="off" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="inputuniqueid" class="col-sm-2 col-form-label ml-4 mt-4">Farmer Unique ID</label>
            <div class="col-sm-6">
              <input type="text" readonly required class="form-control mt-4 uname" id="uniqueid" name="uniqueid">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10 ml-4" style="text-align: center">
              <button type="submit" class="btn btn-success" name="submit">Add New Entry</button>

            </div>
          </div>




        </form>
    </div>
  </div>

  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
      </div>
    </div>
  </footer>
  </div>





  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $(".name").keypress(function(e) {
        var keyCode = e.keyCode || e.which;


        $(".spamname").html("");

        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));


        return isValid;
      });
      $(".uname").keypress(function(e) {
        var keyCode = e.keyCode || e.which;


        $(".spamname").html("");

        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z0-9A-Za-z]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));


        return isValid;
      });
    });

    $(document).ready(function() {

      $(".name").keyup(function() {
        $('.name').css('textTransform', 'capitalize');
      });
      $(".uname").keyup(function() {
        $('.uname').css('textTransform', 'uppercase');
      });



      $("#second,#first,#wua").keyup(function() {
        var a = $("#wua").val().slice(0, 3);
        var b = $("#first").val().slice(0, 3);
        var z = $("#second").val().slice(0, 6);


        var c = a.concat(b, z).toUpperCase();
        $("#uniqueid").val(c);
      });
    });




    $(document).ready(function() {
      $("#btn").hide();
      $("#email").keyup(function() {
        if (validateEmail()) {
          $("#email").css("border", "2px solid green");
          $("#emailMsg").html("<p class='text-success'>Valid</p>");
        } else {
          $("#email").css("border", "2px solid red");
          $("#emailMsg").html("<p class='text-danger'>Invalid</p>");
        }
        buttonState();
      });
    });

    function buttonState() {
      if (validateEmail()) {
        $("#btn").show();
      } else {
        $("#btn").hide();
      }
    }

    function validateEmail() {
      var email = $("#email").val();
      var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
      if (reg.test(email)) {
        return true;
      } else {
        return false;
      }

    }
  </script>
  <script>
    function onlyNumberKey(evt) {


      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>
  <script>
    const input = document.getElementById('second');

    input.oninput = (e) => {
      const cursorPosition = input.selectionStart - 1;
      const hasInvalidCharacters = input.value.match(/[^0-9/]/);

      if (!hasInvalidCharacters) return;

      // Replace all non-digits:
      input.value = input.value.replace(/[^0-9/]/g, '');

      // Keep cursor position:
      input.setSelectionRange(cursorPosition, cursorPosition);
    };
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>

<?php
include '../../config/dbcon.php';


if (isset($_POST['submit'])) {

  $firstname = ucfirst($_POST['firstname']);
  $middlename = ucfirst($_POST['middlename']);
  $lastname = ucfirst($_POST['lastname']);
  $phoneno = $_POST['phoneno'];
  $pancardno = $_POST['pancardno'];
  $aaddhaarno = $_POST['aaddhaarno'];
  $email = $_POST['email'];
  $address = ucfirst($_POST['Address']);
  $mouja = ucfirst($_POST['mouja']);
  $taluka = ucfirst($_POST['taluka']);
  $district = ucfirst($_POST['district']);
  $surveyno = $_POST['surveyno'];
  $totalarea = $_POST['totalarea'];
  $nameofsubdivision = $_POST['nameofsub'];
  $nameofsection = $_POST['nameofsection'];
  $nameofcanal = $_POST['nameofcanal'];
  $nameofoutlet = $_POST['nameofoutlet'];
  $wuaname = ucfirst($_POST['wua']);
  $farmeruniqueid = $_POST['uniqueid'];

  $query = "INSERT INTO farmer_data(`firstname`, `middlename`, `lastname`, `phoneno`, `aaddhaarno`, `pancardno`, `address`, `mouja`, `taluka`, `district`, `surveyno`, `totalarea`, `nameofsubdivision`, `nameofsection`, `nameofcanal`, `nameofoutlet`, `wuaname`, `farmeruniqueid`, `email`) VALUES 
    ('$firstname','$middlename','$lastname','$phoneno','$aaddhaarno','$pancardno','$address','$mouja','$taluka','$district','$surveyno','$totalarea','$nameofsubdivision','$nameofsection','$nameofcanal','$nameofoutlet',' $wuaname','$farmeruniqueid',' $email') ";

  $res = mysqli_query($con, $query);

  if ($res) {
?>
    <script>
      alert("Farmer data inserted properly");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("New Entery not inserted");
    </script>
<?php
  }
}
?>