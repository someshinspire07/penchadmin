<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:../../index.php');
}
?>
<?php
include '../../config/dbcon.php';

$bill_search = "select * from bill_data join farmer_data on bill_data.farmeruniqueid = farmer_data.farmeruniqueid where status='PAID'";
$query = mysqli_query($con, $bill_search);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Paid Bills</title>
  <!-- Bootstrap core CSS-->
  <link href="../../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom fonts for this template-->
  <link href="../../style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Page level plugin CSS-->
  <link href="../../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="../../style/assets/css/sb-admin.css" rel="stylesheet" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Datatable Dependency start -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

  <!-- Datatable Dependency end -->
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index">Paid Bill's</a>
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


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Farmer">
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
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Farmer Data">
                    <a class="nav-link" href="paidbills.php" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Paid Bills</span>
                    </a>
                </li>



            </ul>
      <ul class="navbar-nav ml-auto">
        

        <li class="nav-item">
          <a class="nav-link" href="../../pages/logout.htm">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper" >
    <div class="container-fluid">
      <div class="card ">
        <div class="card-header"><i class="fa fa-table"></i> Paid Bills</div>
        <div class="card-body">
          <div class="table-responsive" >
            <br /><br />
            <table id="table_id" class="table table-striped table-bordered" style="width: 100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Unique ID</th>
                  <th>Bill ID</th>
                  <th>Year</th>
                  <th>Season</th>
                  <th>Amount</th>
                  <th>Paid On Date</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                  
                ?>
               
                  <tr>
                    
                    <td><?php echo  $row['firstname']." ".$row['lastname'] ?></td>
                    <td><?php echo  $row['farmeruniqueid'] ?></td>
                    <td><?php echo  $row['bill_id'] ?></td>
                    <td><?php echo  $row['year'] ?></td>
                    <td><?php echo  $row['season'] ?></td>
                    <td><?php echo  $row['total_amount'] ?></td>
                    <td><?php echo  $row['final_pay_date'] ?></td>
                    <td><?php echo  $row['status'] ?></td>
                    
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- footer -->
    <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small><b>PENCH RECOVERY ADMIN PANEL</b></small>
          </div>
        </div>
      </footer>
    <!-- footer end -->
  </div>

  <script>
    $(document).ready(function() {
      $("#table_id").DataTable({
        dom: "Bfrtip",
        responsive: true,
        pageLength: 25,


        buttons: ["copy", "csv", "excel", "pdf", "print"],
      });
    });
  </script>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>