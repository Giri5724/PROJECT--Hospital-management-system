<?php
include("include/connection.php");

if (isset($_POST['create'])){

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($fname)){

        $error['acc'] = "Enter Firstname";
    }elseif (empty($sname)){
        $error['acc'] = "Enter Surname";
    }elseif (empty($uname)){
        $error['acc']= "Enter Username";
    }elseif (empty($email)){
        $error['acc'] = "Enter Email";
    }elseif (empty($phone)){
        $error['acc']="Enter Phone Number";
    }
    elseif ($gender == ""){
        $error['acc'] = "Select Your Gender";
    }
    elseif ($country == ""){
        $error['acc'] = "Select Your Country";
    }elseif (empty($password)){
        $error['acc'] = "Enter Password";
    }elseif ($con_pass != $password){
        $error['acc'] = "Both Password do not Match";
    }

    if (count($error)==0){
        $query = "INSERT INTO patient(firstname, surname, username, email, phone, gender, country, password, date_reg,profile) 
                  VALUES('$fname','$sname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";

        $res = mysqli_query($connect, $query);

        if ($res){
            header("Location:patientlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
        }
    }

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Patient's Account</title>
</head>

<body style="background-image: url(img/back.jpg); background-repeat: no-repeat; background-size: cover">

<?php
   include("include/header.php");

?>

      <div class="container-fluid">
          <div class="col-md-12">
              <div class="row">
                   <div class="col-md-3">

                   </div>
                  <div class="col-md-6 my-2 jumbotron">
                       <h5 class="text-center text-info my-2">Create Account</h5>
                      <form action="" method="post">
                          <div class="form-group">
                              <label for="">Firstname</label>
                              <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                          </div>

                          <div class="form-group">
                              <label for="">Surname</label>
                              <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                          </div>

                          <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                          </div>

                          <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
                          </div>

                          <div class="form-group">
                              <label for="">Phone No.</label>
                              <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                          </div>

                          <div class="form-group">
                              <label for="">Gender</label>
                              <select name="gender" id="" class="form-control">
                                  <option value="">Select Your Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                              </select>
                          </div>


                          <div class="form-group">
                              <label for="">Country</label>
                              <select name="country" id="" class="form-control">
                                  <option value="">Select Your Country</option>
                                  <option value="GHANA">GHANA</option>
                                  <option value="USA">USA</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                          </div>


                          <div class="form-group">
                              <label for="">Confirm Password</label>
                              <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                          </div>

                          <input type="submit" name="create" value="Create Account" class="btn btn-info">
                          <p>I already have an account <a href="patientlogin.php">Click here. </a></p>

                      </form>
                  </div>
                  <div class="col-md-3">

                  </div>
              </div>
          </div>

      </div>

</body>

</html>