<!DOCTYPE html>
<html lang="en">
<head>
    <title>HMS Home Page</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .button-container {
            position: relative; /* Position parent relatively */
        }
        .apply-now-btn {
            position: absolute;
            top: 245px; /* Moves the button down by 100 pixels */
            left: 50%; /* Optional: center horizontally if needed */
            transform: translateX(-50%); /* Optional: center horizontally */
        }
    </style>
</head>
<body>

    <?php include("include/header.php"); ?>

    <div style="margin-top: 60px"></div>
    <div class="container">
        <!--Start setting the browser screen at standard width division of 12-->
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3 mx-1 shadow">
                    <img src="img/info.png" alt="" style="width: 100%; height: 190px">
                    <h5 class="text-center">Click on the button for more information</h5>
                    <a href="info.php">
                        <button class="btn btn-success my-3" style="margin-left: 20%">More Information</button>
                    </a>
                </div>

                <div class="col-md-3 mx-1 shadow">
                    <img src="img/patient.jpeg" alt="" style="width: 100%; height: 190px">
                    <h5 class="text-center">Create Account so that we can take good care of you</h5>
                    <a href="patientaccount.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%">Create Account..!!</button>
                    </a>
                </div>

                <div class="col-md-3 mx-1 shadow button-container">
                    <img src="img/hospital.jpeg" alt="" style="width: 100%; height: 190px">
                    <h5 class="text-center">We are looking for Doctors (closed)</h5>
                    <a href="apply.php">
                        <button class="btn btn-success my-3 apply-now-btn">Apply Now..!!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
