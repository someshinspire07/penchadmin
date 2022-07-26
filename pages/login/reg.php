<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reg form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
</head>

<body>
    <h1 class="text-success text-center">
        Project Irrigation
    </h1>
    <h2 class="text-center">OTL form</h2>
    <div class="container">
        <form action="#" method="POST" name="form1">
            <div class="form-group">
                <label for="fname">Name</label>
                <input type="text" class="form-control" id="txtName" placeholder="Enter Full Name" required name="name">
                <span id="lblError" style="color: red"></span>
            </div>
            <div class="form-group">
                <label for="lname">Password</label>
                <input type="password" class="form-control" id="lname" placeholder="Enter Your Password" required name="pass">
            </div>
            <div class="form-group">
                <label for="lname">Confirm Password</label>
                <input type="password" class="form-control" id="lname" placeholder="Enter Your Comfirm Password" required name="rpass">
            </div>

            <div class="container d-flex justify-content-center">
                <button type="submit" name="submit" id="submit" class="btn bg-success">
				Submit
            </button>
            </div>

        </form>
    </div>

    <?php

        include '../../config/dbcon.php';

        if(isset($_POST['submit'])){

            $username = mysqli_real_escape_string($con,$_POST['name']);
            $password = mysqli_real_escape_string($con,$_POST['pass']);
            $cpassword = mysqli_real_escape_string($con,$_POST['rpass']);

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $usernamecheck = "select * from admin_login where username='$username'";
            $query = mysqli_query($con,$usernamecheck);

            $usercount = mysqli_num_rows($query);

            if($usercount>0){
                ?>
                <script>
                    alert ('username already used');
                </script>


                <?php
            }
            else{
                if($password === $cpassword){

                    $insert = "insert into admin_login (username,password) values ('$username','$pass')";
                    $iquery = mysqli_query($con,$insert);

                    if($iquery){
                        ?>
                        <script>
                            alert ('new login ID password inserted');
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert ('Not inserted properly');
                        </script>
        
        
                        <?php
                    }
                    
                }
                else{
                    ?>
                    <script>
                        alert ('password not matched');
                    </script>
    
    
                    <?php
                }
            }

        }

    ?>





<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>