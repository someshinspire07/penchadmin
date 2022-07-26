<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../../index.php');
}
?>

<?php
include '../../config/dbcon.php';

$farmeruniqueid = $_GET['id'];

$query = "delete from farmer_data where farmeruniqueid='$farmeruniqueid'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
?>
    <script>
        alert("<?php echo $firstname ?> farmer data deleted");
    </script>

<?php
} else {
?>
    <script>
        alert("Farmer Data Not Deleted");
    </script>
<?php
}

header('location:farmer_data.php');

?>