<?php
session_start();
include("include/connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    // Check for empty inputs
    if (empty($uname)) {
        $error['login'] = "Enter Username";
    } elseif (empty($password)) {
        $error['login'] = "Enter Password";
    } else {
        // Execute the query
        $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
        $res = mysqli_query($connect, $query);

        // Fetch the result as an associative array
        if ($res) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

            // Check if any row was returned
            if ($row) {
                // Check the status of the user
                if ($row['status'] === "Pending") {
                    $error['login'] = "Please Wait For the admin to confirm";
                } elseif ($row['status'] === "Rejected") {
                    $error['login'] = "Try again Later";
                } else {
                    // Successful login
                    $_SESSION['doctor'] = $uname;
                    header("Location: doctor/index.php");
                    exit(); // Important to stop further execution
                }
            } else {
                $error['login'] = "Invalid Username or Password";
            }
        } else {
            $error['login'] = "Query failed: " . mysqli_error($connect);
        }
    }
}

if (isset($error['login'])) {
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else {
    $show = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Login Page</title>
</head>
<body style="background-image: url(img/hospBuild.jpg); background-size: cover; background-repeat: no-repeat">
<?php include("include/header.php"); ?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron my-5">
                <h5 class="text-center my-5">Doctors Login</h5>
                <div>
                    <?php echo $show; ?>
                </div>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>

                    <input type="submit" name="login" class="btn btn-success" value="Login">

                    <p>I don't have an account <a href="apply.php">Apply Now..!!</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
