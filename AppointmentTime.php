<?php 

    include("dbConnection.php");
    extract($_POST);

    if(isset($_POST["docId"])){
        $doctorid = $_POST["docId"];
        $priod = $_Post["period"];

        $select = "select * from Appointment where DoctorId = '$doctorid' && Period = '$priod'";

        $run = mysqli_query($con, $select);
        $row = mysqli_num_rows($run);
        if($row>0){
            $result = mysqli_fetch_array($run);
        }
    }

?>