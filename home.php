<?php 
    include('dbConnection.php');
    session_start();
    if(isset($_SESSION["pname"]) && isset($_SESSION["pid"])){
        $pname = $_SESSION["pname"];
        $pid = $_SESSION["pid"];

        $select = "select * from patient where Id= '$pid'";

        $run = mysqli_query($con, $select);
        $row = mysqli_num_rows($run);
        if($row>0){
            $result = mysqli_fetch_array($run);
            $surname = $result["Surname"];
            $phone = $result["PhoneNo"];
            $email = $result["Email"];
        }
    }
    else{
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: url('image/homedoctor.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
        <a class="navbar-brand" href="home.php"><?php echo $pname ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="appointment.php">Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myappointment.php">My Appointment</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Feedback</a> -->
                </li>    
            </ul>
        </div>
        <div class="float-right">
            <ul class="navbar-nav">
                <li><a href="logout.php" class="nav-link">Log out</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-lg-4">
            <div class="col-md-4" >
                <div class="bg-white">
                    <div class="d-inline-block">
                        <div>
                            <span class="font-weight-bold">Name : </span>
                            <span style="font-family:sanserif;font-size:18px;color:#2fa37d">
                            <?php echo $pname?></span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Surname : </span>
                            <span style="font-family:sanserif;font-size:18px;color:#2fa37d">
                            <?php echo $surname?></span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Email : </span>
                            <span style="font-family:sanserif;font-size:18px;color:#2fa37d">
                            <?php echo $email?></span>
                        </div>
                        <div>
                            <span class="font-weight-bold">Phone No : </span>
                            <span style="font-family:sanserif;font-size:18px;color:#2fa37d">
                            <?php echo $phone?></span>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>