
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <?php
       // Check if the data is coming or not 
    if (isset($_GET['submitregistration'])) {
    echo 'OK';

    // 1. DB connection Open
    $conn = mysqli_connect('localhost','root','','registration_db');
   
   
   // Always Filter the incoming Data
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $pass = mysqli_real_escape_string($conn, $_GET['pass']);
    $cpass = mysqli_real_escape_string($conn, $_GET['cpass']);
    $dob = mysqli_real_escape_string($conn, $_GET['dob']);
    $ph = mysqli_real_escape_string($conn, $_GET['ph']);
      

    if($pass == $cpass){
      $pass = md5($pass);
   // 2. Build The query
  //   echo '<div class="alert alert-success  offset-3 w-50 text-center" role="alert">
  //        Password Matched!
  //     </div>
  // ';


   $query =" INSERT INTO student_tbl(`name`,`email`,`password`,`dob`,`mobile`)
   VALUE('$name','$email','$pass','$dob','$ph')";

    mysqli_query($conn, $query);

      echo
        '<div class="alert alert-success  offset-3 w-50 text-center" role="alert">
        Data Inserted in DataBase Sucessfully!
     </div>';
    


    }else {
      echo '<div class="alert alert-danger w-50 text-center offset-3" role="alert">
            Password Not Matched!
           </div>
    ';
    }

    //5.  DB Connection Close 
         mysqli_close($conn);

  
    }
   
    
    
    // else{
    // echo 'No';
    // }
  
  
  ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="$_GET" class="offset-3 w-50">
    <h1 class="text-success text-center">Registration Form</h1>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" >
    <div id="name" class="form-text"></div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="email" class="form-control" >
    <div id="email" class="form-text"></div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="password">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm password</label>
    <input type="password" name="cpass" class="form-control" id="cpassword">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control" id="date">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mobile No</label>
    <input type="number" name="ph" class="form-control" id="mobile">
  </div>


  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="Check">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <input type="submit" name="submitregistration" class="btn btn-success" value="Register Now"/>
</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>