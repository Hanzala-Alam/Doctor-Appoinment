<?php 
    include('dbConnection.php');
    session_start();
    if(isset($_SESSION["dname"])){
        $dname = $_SESSION["dname"];
        $did = $_SESSION["did"];
        
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body{
            background:url('image/docappointment.jpg');
            background-size:cover;
        }

        #datef{
            display:none;
            color:white;
        }

        #check{
            display:none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark fixed-top">
        <a class="navbar-brand" href="doctorhome.php"><?php echo $dname ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="appointment.php">Appointment</a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Appointment</a>
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
        <div class="row">
            <div class="col-md-12 ">
                <div class="jumbotron bg-success">
                    <h1 class="text-center text-white">Doctor Appointment List</h1>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered bg-success text-white table-responsive-md table-striped">
                    <tr>
                        <th>Token No</th>
                        <th>Docter</th>
                        <th>Patient</th>
                        <th>Phone No</th>
                        <th>Date</th>
                        <th>Priod</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Fees</th>
                        <th></th>
                    </tr>
                    <?php
                        $select = "select * from Appointment where DoctorId = '$did'";
                        $run = mysqli_query($con, $select);
                        if($run){
                            while($res = mysqli_fetch_array($run)){
                                $doctorId = $res["DoctorId"];
                                $docname = "select Name from Doctor where Id = '$doctorId'";
                                $r = mysqli_query($con,$docname);
                                if($r){
                                    $result = mysqli_fetch_array($r);
                                    $doctorname = $result["Name"];
                                    echo "<tr>
                                    <td>".$res['Id']."</td>
                                    <td>".$doctorname."</td>
                                    <td>".$res['Name']."</td>
                                    <td>".$res['PhoneNo']."</td>
                                    <td>".$res['Date']."</td>
                                    <td>".$res['Period']."</td>
                                    <td>".$res['StartTime']."</td>
                                    <td>".$res['StopTime']."</td>
                                    <td>".$res['Fees']."</td>
                                    <td><a href='cancel.php?id=".$res['Id']."' class='btn btn-dark' onclick='return del()'>Cancel</a></td>
                                    </tr>";
                                }
                            }
                        }                         
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
            
        function del(){
            return confirm("Are you sure cancel appointment");
        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>