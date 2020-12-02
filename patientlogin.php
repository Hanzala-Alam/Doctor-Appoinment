<?php 
    include("dbConnection.php");
    session_start();
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

    <div style="display:flex;align-items:center;height:100vh;justify-content:center;">
        <div class="col-md-9 ">
            <div style="display:flex">
                <div >
                    <img src="image/patientlogin.jpg" height="550" width="420">
                </div>
                <div class="col-md-6">
                    <br><br>
                    <div class="font-weight-bold text-center jumbotron rounded-top bg-white" >
                        <span style="float:left;font-size:28px;font-family:sanserif;color:#39bdc4">Patient Login Form</span>
                        <br><br><br>
                        <form action="" method="POST">
                            <div style="margin-bottom:10px">
                                <input type="text" name="email" style="width:250px" class="form-control" placeholder="Email">
                            </div>
                            <div style="margin-bottom:10px">
                                <input type="password" name="password" style="width:250px" class="form-control" placeholder="Password">
                            </div>
                            
                            <div style="float:left;margin-bottom:10px">
                                <input type="submit" name="login" style="float:left" class="btn btn-outline-info" value="Log in">
                                &nbsp;&nbsp;&nbsp;
                                <a href="psignup.php">Create new Account</a>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $select = "select * from Patient where Email = '$email' and Password = '$password'";

        $run = mysqli_query($con, $select);
        if(mysqli_num_rows($run)>0){
            $result = mysqli_fetch_array($run);
            $_SESSION["pname"] = $result["Name"];
            $_SESSION["pid"] = $result["Id"];
            header("location:home.php");
        }
    }
?>

