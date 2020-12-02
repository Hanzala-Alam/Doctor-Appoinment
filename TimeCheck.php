<?php
    include("dbConnection.php");
    extract($_POST);
    if(isset($_POST["date"])){
        $priod = $_POST["tpriod"];
        $docId = $_POST["docId"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        // echo $priod.":".$docId.":".$date;

        $select = "select * from Appointment where DoctorId = '$docId' and Period = '$priod' and Date = '$date' and StartTime = '$time'";

        $run = mysqli_query($con,$select);
        $row = mysqli_num_rows($run);
        if($row>0){
            echo "Yes";
        }
        else{
            echo "No";
        }
    }
?>