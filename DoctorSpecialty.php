<?php
    include('dbConnection.php');
    
    extract($_POST);


    if(isset($_POST["value"])){
        $specialty =  $_POST["value"];

        $select = "select * from doctor where Specialty = '$specialty'";

        $run = mysqli_query($con, $select);
        $row = mysqli_num_rows($run);
        if($row>0){
            $doctor="<div style='width:100%;color:white;font-family:sansarif;padding:0 5px'>
                <div class='d-inline-block'>
                    <select name='doc' onchange='DoctorId()' class='form-control d-inline-block' style='width:250px;' required>
                        <option value=''>-- Select Doctor --</option>";
            while($result = mysqli_fetch_array($run)){
                    $doctor.="<option value=".$result['Id'].">".$result['Name']."</option>";
            }
        }
        $doctor.="</select>
                </div><br><br>
            </div>";
        echo $doctor;
    }

?>


<script>
    function DoctorId(){
        var value = f.doc.value;
        $.ajax({
            url:'DoctorDtails.php',
            type:'post',
            data: {value:value},
            success: function(data,status){
                $("#detail").html(data);
                var div = document.getElementById("datef");
                    div.style.display = "block";
                // alert(data);
            }
        });
    }
</script>

<script src="js/jquery.min.js"></script>