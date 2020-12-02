<?php 

    include("dbConnection.php");
    extract($_POST);
    date_default_timezone_set("Asia/Karachi");
    if(isset($_POST["value"])){
        $doctorid = $_POST["value"];
        $select = "select * from Doctor where Id = '$doctorid'";
        
        $run = mysqli_query($con, $select);
        $row = mysqli_num_rows($run);

        if($row>0){
            $result = mysqli_fetch_array($run);
            $fees = $result["Fees"];
            if($result["Priod"] == "Day_Night"){
                $dataDetails = "<div><select name='priod' onchange='timeContainer()' class='form-control' style='width:250px' required>
                    <option value=''>--Select Appointment Priod--</option>
                    <option value='Day'>Day</option>
                    <option value='Night'>Night</option>
                </select><input name='fees' type='hidden' value='$fees'></div>";
            }
            else{
                $dataDetails = "<div><select name='priod' onchange='timeContainer()' class='form-control' style='width:250px' required>
                    <option value=''>--Select Appointment Priod--</option>
                    <option value='Day'>Day</option>
                </select><input name='fees' type='hidden' value='$fees'></div>";
            }
        }
        echo $dataDetails;
    }

?>

<script>
    function timeContainer(){
        var tpriod = f.priod.value;
        var docId = f.doc.value;
        var date = f.date.value;
        $.ajax({
            url:'TimeGenerat.php',
            type:'post',
            data:{tpriod:tpriod,docId:docId,date:date},
            success: function(data, status){
                $("#timed").html(data);
            }
        });
    }
</script>

<script src="js/jquery.min.js"></script>