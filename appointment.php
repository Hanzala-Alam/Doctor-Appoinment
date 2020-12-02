<?php 
    include('dbConnection.php');
    session_start();
    if(isset($_SESSION["pname"])){
        $pname = $_SESSION["pname"];
        $pid = $_SESSION["pid"];
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
            background:url('image/appointmentform.jpg');
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
        <a class="navbar-brand" href="home.php"><?php echo $pname ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Appointment</a>
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

    <div class="container  mt-lg-5">
        <div class="row  mt-lg-5" >
            <div class="col-md-6 m-auto mt-lg-4">
                <div class="rounded-top " style="width:100%;z-index:2;margin-top:50px;overflow:hidden;position:relative;background:white;border-box: 0 10px 5px black;box-shadow: 0px 0px 14px 0px rgba(24,163,145,1)">
                    <h3 class="text-center pt-4">Appointment Form</h3>
                    <div class="col-md-8 m-auto">
                        <form action="" method="POST" name="f" style="padding:20px 5px 20px 5px">
                            <div style="width:100%;color:black;font-family:sansarif;padding:20px 5px">
                                <div class="d-inline-block">
                                    <select name="spec" onchange="contentDoctor()" class="form-control d-inline-block" style="width:250px;" required>
                                        <option value="">-- Select Specialty --</option>
                                        <option value="Bone">Bone</option>
                                        <option value="Heart">Heart</option>
                                        <option value="Mental Health">Mental Health</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                            </div>

                            <div id="doctorcontainer"></div>
                            
                            <div id="datef" style="color:black;font-family:sansarif;padding:0px 5px">
                                
                                <div class="d-inline-block" >
                                    <input type="text" name="name" placeholder="Enter Patient Name" class="form-control" required style="width:250px;" >
                                </div>
                                <br><br>
                                
                                <div class="d-inline-block" >
                                    <input type="number" min="1" name="phone" placeholder="Enter Phone Number" class="form-control" required style="width:250px;">
                                </div>
                                <br>
                                <hr>
                                <div class="d-inline-block"  >
                                    <span  style="font-size:16px">Date :&nbsp;</span>
                                </div>
                                <div class="d-inline-block" >
                                    <input type="date" name="date" style="width:200px;" class="form-control" required>
                                </div><br><br>
                                <div id="detail"></div>
                                <br>
                                <div id="timed"></div>
                                <div class="pt-4">
                                    <input type="submit" name="book" disabled value="Book" class="btn btn-outline-info" id="book">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <?php 
    
        if(isset($_POST["book"])){

            $specialty = $_POST["spec"];
            $doctor = $_POST["doc"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $date = $_POST["date"];
            $priod = $_POST["priod"];
            $time = $_POST["atime"];
            $fees = $_POST["fees"];
            $ehour = endHour1($time);
            $emint = endMint1($time);
            $endtime = $ehour.":".$emint;

            $insert = "insert into Appointment(DoctorId,PatientId,StartTime,StopTime,Period,Fees,Date,specialty,PhoneNo,Name)values('$doctor','$pid','$time','$endtime','$priod','$fees','$date','$specialty','$phone','$name')";

            $run = mysqli_query($con, $insert);
            if($run){
                echo "<script>alert('Your Appointment Book Successfully');
                    window.location.href = 'home.php';
                </script>";
            }
            else{
                echo "<script>alert('your Appointment is Cancel !!')</script>";
            }           
        }



        function endHour1($h){
            $hour = str_split($h,"2");
            $hour = $hour[0];
            $hour = $hour+1;
            return $hour;
        }

        function endMint1($m){
            $minut = str_split($m,"3");
            $minut = $minut[1];
            return $minut;
        }
    ?>

    <script>
        function contentDoctor(){
            var specialty = f.spec.value;
            $.ajax({
                url:'DoctorSpecialty.php',
                type:'post',
                data: {value:specialty},
                success: function(data,status){
                    $("#doctorcontainer").html(data);
                    $("#datef").attr(display,"block");
                }
            });
        }

        function CheckTime(){
            var tpriod = f.priod.value;
            var docId = f.doc.value;
            var date = f.date.value;
            var time = f.atime.value;

            $.ajax({
                url:'TimeCheck.php',
                type:'post',
                data:{tpriod:tpriod,docId:docId,date:date,time:time},
                success: function(data,status){
                    if(data != "Yes"){
                        var aa = document.getElementById('check');
                        aa.style.display = "inline-block";
                        f.book.disabled = false;
                    }
                    else{
                        alert("Dear Patient This time is Reserved Please Choose Defrant");
                        timeContainer();
                        f.book.disabled = true;
                    }
                }
            });
            // alert("as");
        }

    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>