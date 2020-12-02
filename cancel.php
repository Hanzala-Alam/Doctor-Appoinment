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

    if(isset($_GET["id"])){
        $AppointId = $_GET["id"];
        $cancel = "delete from Appointment where Id = '$AppointId'";
        $run = mysqli_query($con, $cancel);
        
        if($run){
            header("location:myappointment.php");
        }        
    }
?>