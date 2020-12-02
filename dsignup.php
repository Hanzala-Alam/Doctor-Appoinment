<?php
    include("dbConnection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div style="background:#a68b4e;width:200px;height:300px;position:absolute;top:0;left:0px;z-index:-1;transform: scale(1.8) rotate(180deg) skew(-50deg, 25deg);margin-left:-150px;">
    </div>
    <h2 style="transform:rotate(-40deg);margin:-150px 0px 0px -100px;font-size:35px;font-family:sansarif;color:white;font-weight:bold"> Doctor Appointment</h2>
    <div style="display:flex;align-items:center;height:100vh;justify-content:center;">
        <div class="col-md-10 offset-2">
            <br><br><br><br><br><br>
            <div style="display:flex">
                <div class="col-md-7 offset-3" style="background:transparent;margin-top:250px">
                    <div class="font-weight-bold text-center jumbotron bg-white" style="background:transparent">
                        <h3 style="font-size:30px;font-family:sansarif;color:black;font-weight:bold;color:#317beb">Doctor Sign up</h3>
                        <br>
                        <form action="" method="POST" onsubmit="return match()" name="f">
                            <div>
                                <div style="margin-bottom:10px;width:185px;display:inline-block">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                                </div>
                                <div style="margin-bottom:10px;width:185px;display:inline-block">
                                    <input type="text" name="surname" class="form-control" placeholder="Enter your Surname" required>
                                </div>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>                            
                            <div style="margin-bottom:10px">
                                <input type="number" name="phone" min="03000000000" class="form-control" placeholder="Enter your Phone No" required>
                            </div>

                            <div>
                                <div style="margin-bottom:10px;width:185px;display:inline-block">
                                    <select name="spec" class="form-control" required>
                                        <option value="">-- Select Specialty --</option>
                                        <option value="Bone">Bone</option>
                                        <option value="Heart">Heart</option>
                                        <option value="MentalHealth">Mental Health</option>
                                        <option value="Surgery">Surgery</option>
                                    </select>
                                </div>
                                <div style="margin-bottom:10px;width:185px;display:inline-block">
                                    <select name="priod" class="form-control" onchange="PriodChange();" required>
                                        <option value="">-- Select Priod --</option>
                                        <option value="Day">Day</option>
                                        <option value="Night">Night</option>
                                        <option value="Day_Night">Day / Night</option>
                                    </select>
                                </div>
                            </div>
                            <div style="margin-bottom:10px;float:left;display:inline-block">
                                <span style="margin-bottom:10px;display:inline-block;font-size:15px">Day Time&nbsp;&nbsp;&nbsp;</span>
                                <div style="display:inline-block;">
                                    <span style="display:inline-block">To</span>
                                    <input type="time" name="dttime" style="width:138px" class="form-control" placeholder="12:00 Pm" disabled required>
                                </div>&nbsp;-
                                <div style="display:inline-block;">
                                    <span style="display:inline-block">From</span>
                                    <input type="time" name="dftime" style="width:138px" class="form-control" placeholder="02:00 Pm" disabled required>
                                </div>
                            </div>
                            <div style="margin-bottom:10px;float:left;display:inline-block;font-size:15px">
                                <span style="margin-bottom:10px;display:inline-block">Night Time</span>
                                <div style="display:inline-block;">
                                    <span style="display:inline-block">To</span>
                                    <input type="time" name="nttime" style="width:138px" class="form-control" placeholder="12:00 Pm" disabled required>
                                </div>&nbsp;-
                                <div style="display:inline-block;">
                                    <span style="display:inline-block">From</span>
                                    <input type="time" name="nftime" style="width:138px" class="form-control" placeholder="02:00 Pm" disabled required>
                                </div>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="password" name="cpass" class="form-control" placeholder="Enter your Confim Password" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="number" min="1" name="fees" class="form-control" placeholder="Enter your Fees" required>
                            </div>
                            <div style="float:left;margin-bottom:10px">
                                <input type="submit" name="signup" style="float:left" class="btn btn-outline-info" value="Sign up">
                                &nbsp;&nbsp;&nbsp;
                                <a href="docterlogin.php" class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>


    <script>
        function PriodChange(){
            var priod = f.priod.value;
            if(priod == "Day"){
                f.dttime.disabled = false;
                f.dftime.disabled = false;

                f.nttime.disabled = true;
                f.nftime.disabled = true;
            }
            else if(priod == "Night"){
                f.nttime.disabled = false;
                f.nftime.disabled = false;
                
                f.dttime.disabled = true;
                f.dftime.disabled = true;
            }
            else if(priod == "Day_Night"){
                f.dttime.disabled = false;
                f.dftime.disabled = false;
                f.nttime.disabled = false;
                f.nftime.disabled = false;
            }
            
        }

        function match(){
            var password = f.password.value;
            var cpassword = f.cpass.value;
            if(password != cpassword){
                alert("Password not match");
                return false;
            }
            else{
                return true;
            }
        }
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $number = $_POST["phone"];
        $spacialty = $_POST["spec"];
        $priod = $_POST["priod"];
        $password = $_POST["password"];
        $fees = $_POST["fees"];

        if(isset($_POST["dttime"]) && isset($_POST["dftime"])){
            $dayTimeTo = $_POST["dttime"];
            $dayTimeFrom = $_POST["dftime"];
            $dayTime = $dayTimeTo." - ".$dayTimeFrom;
            if(isset($_POST["nttime"]) && isset($_POST["nftime"])){
                $nightTimeTo = $_POST["nttime"];
                $nightTimeFrom = $_POST["nftime"];
                $nightTime = $nightTimeTo."-".$nightTimeFrom;
            }
            else{
                $nightTimeTo = "null";
                $nightTimeFrom = "null";
                $nightTime = $nightTimeTo."-".$nightTimeFrom;
            }
        }
        else{
            $dayTimeTo = "null";
            $dayTimeFrom = "null";
            $dayTime = $dayTimeTo."-".$dayTimeFrom;
        }

        $insert = "insert into Doctor(Name,Surname,Specialty,PhoneNo,Priod,DayTime,Fees,Email,Password,NightTime)values('$name','$surname','$spacialty','$number','$priod','$dayTime','$fees','$email','$password','$nightTime')";

        $run = mysqli_query($con,$insert);
        if($run){
            echo "<script>alert('Doctor Sign up Successfully !!');
                window.location.href = 'docterlogin.php';
            </script>";       
        }
        else{
            $find = "select Email from Doctor where Email = '$email'";
            $fRun = mysqli_query($con,$find);
            if(mysqli_num_rows($fRun)>0){
                echo "<script>alert('your Email is exist please insert defrant Email')</script>";
            }
            else{
                echo "<script>alert('Somthing went wrong')</script>";
            }
            
        }
    }


?>

<!-- echo "<script>alert('Hello')</script>";   -->