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
                <div class="col-md-5 offset-3" style="background:transparent">
                    <div class="font-weight-bold text-center jumbotron bg-white" style="background:transparent">
                        <h3 style="font-size:33px;font-family:sansarif;color:black;font-weight:bold;color:#eb6631">Patient Sign up</h3>
                        <br>
                        <form action="" method="POST" onsubmit="return match()" name="f">
                            <div style="margin-bottom:10px">
                                <input type="text" name="name" style="width:250px" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="text" name="surname" style="width:250px" class="form-control" placeholder="Enter your Surname" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="number" name="phone" style="width:250px" class="form-control" placeholder="Enter your Phone No" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="email" name="email" style="width:250px" class="form-control" placeholder="Email" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="password" name="password" style="width:250px" class="form-control" placeholder="Enter your Password" required>
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="password" name="cpass" style="width:250px" class="form-control" placeholder="Enter your Confim Password" required>
                            </div>
                            <div style="float:left;margin-bottom:10px">
                                <input type="submit" name="signup" style="float:left" class="btn btn-outline-info" value="Sign up">
                                &nbsp;
                                <a href="#" class="btn btn-dark">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <script>
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
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $insert = "insert into patient(Name,Surname,PhoneNo,Email,Password)values('$name','$surname','$phone','$email','$password')";

        $run = mysqli_query($con, $insert);
        if($run){
            echo "<script>alert('Ptient Sign up Successfully !!');
                window.location.href = 'patientlogin.php' ;
            </script>";
        }
    }
?>

        

