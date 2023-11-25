<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form_1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>

<body>
    <?php   
            if(isset($_GET['submitregistration'])) {
                  //  echo 'ok';

             //build Connection
           $conn = mysqli_connect('localhost', 'root', '', 'form1_db');

           // filter and snitize Data
        $name = mysqli_real_escape_string($conn, $_GET['name']);
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $pass = mysqli_real_escape_string($conn, $_GET['pass']);
        $cpass = mysqli_real_escape_string($conn, $_GET['cpass']);
        $uname = mysqli_real_escape_string($conn, $_GET['uname']);
        $dob = mysqli_real_escape_string($conn, $_GET['dob']);
        if(isset($_GET['agree'])){
         $agree = mysqli_real_escape_string($conn, $_GET['agree']);
        }
      


        if(isset($agree) && $agree == 'yes'){
           // echo 'agree';
        

           // check pss $ cpass matched
           if ($pass == $cpass) {


            $sql ="SELECT * FROM student1_tbl WHERE username='$uname' OR email ='$email'";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
             

                if($count > 0){
                    echo ' <script> swal("eroor!", "Username & Email Already Exist!", "error"); </script> ';
                }else{
                   // echo 'username and email not avalable in db';

                    $sql = "INSERT INTO student1_tbl(`name`,`email`,`password`,`username`,`dob`) VALUE('$name','$email','$pass','$uname','$dob')";

                    mysqli_query($conn, $sql);

                    echo '<script>swal("SUCCESS!", "Registered Successfully!", "success");</script>' ;

                    mysqli_close($conn);

                }
            
           }else{   // password block
                echo '<script>Command: toastr["error"]("Password Not Matched!")
                </script>';
           }



        }else {   //agree else here
            echo '<script>swal("eroor!", "Clicked Terms & Condition!", "error");</script>' ;
        }


    }
    
    
    ?>



    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="$_GET" class="offset-3  w-50 mt-5">
        <h1 class="text-warning text-center">REGISTRATION</h1>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name">
            <div id="name" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
         </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="pass">
        </div>


        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">User Name</label>
            <input type="text" name="uname" class="form-control" id="uname">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date of Birth</label></label>
            <input type="date" name="dob" class="form-control" id="date">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="agree" value="yes" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" name="submitregistration" class="btn btn-success" value="Register Now"/>
    </form>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>