<!DOCTYPE html>
<html>

<head>
    <title>Hospital Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .info-section img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .row-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .col-info {
            flex: 1;
            padding: 10px;
        }
        .left-info, .right-info {
            flex: 1;
            padding: 10px;
        }
        .left-info img, .right-info img {
            max-width: 100%; /* Ensure images fit within the container */
            height: auto;
            display: block; /* Ensure images are displayed as block elements */
            margin-left: auto; /* Center image horizontally if needed */
            margin-right: auto; /* Center image horizontally if needed */
        }
        .title {
            font-size: 4rem; /* Larger title size */
            margin-bottom: 20px;
        }
        .small-img {
            max-width: 50%; /* Reduce image size */
            height: auto;
        }
    </style>
</head>

<body>
<?php include("include/header.php"); ?>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-10" style="margin-top: 50px">
            <h5 class="text-center title">Hospital Information</h5>
            
            <div class="row-info">
                <div class="col-info left-info">
                    <h5>About Us</h5>
                    <img src="img/hosp2.jpg" alt="About Us Image">
                    <p>We are a dedicated healthcare facility committed to providing top-quality medical care to our community. Our state-of-the-art hospital offers a range of services, including emergency care, surgery, and outpatient services.</p>
                </div>
                <div class="col-info right-info">
                    <h4>Owner</h4>
                    <img src="img/owner.jpg" alt="Owner Image" class="small-img">
                    <br>
                    </br>
                    <p>Dr. GIRIDHARAN, the founder and owner of BG groups & hospitals.He was born on July 5, 2004 in Chennai,Tamil Nadu, India. He has over 30 years of experience in the medical field.Through his hard work and determination, Dr.GIRI learned how to hold a scalpel and perform cataract surgery. Eventually, he was able to perform more than one hundred surgeries a day and over one hundred thousand successful eye surgeries during his lifetime His vision is to ensure that every patient receives compassionate and comprehensive care</p>
                    
                    <h4>Founder</h4>
                    <img src="img/owner.jpg" alt="Founder Image" class="small-img">
                    <p>Dr. GIRIDHARAN, the founder and owner of BG groups & hospitals.He was born on July 5, 2004 in Chennai,Tamil Nadu, India. He has over 30 years of experience in the medical field.Through his hard work and determination, Dr.GIRI learned how to hold a scalpel and perform cataract surgery. Eventually, he was able to perform more than one hundred surgeries a day and over one hundred thousand successful eye surgeries during his lifetime His vision is to ensure that every patient receives compassionate and comprehensive care</p>
                </div>
            </div>
            
            <div class="info-section">
                <h4>Address</h4>
                <p>No:378 BG Groups,Chennai,TamilNadu,India 602024</p>
            </div>

            <div class="info-section">
                <h4>Contact</h4>
                <p>(044) 456-7890</p>
            </div>

            <div class="info-section">
                <h4>Email</h4>
                <p>221801504@rajalakshmi.edu.in</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
