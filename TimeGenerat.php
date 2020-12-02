<?php
    include("dbConnection.php");

    extract($_POST);

    if(isset($_POST["tpriod"])){
        $docid = $_POST["docId"];
        $date = $_POST["date"];

        if(isset($_POST["tpriod"]) == "Day"){
            $id = $_POST['docId'];
            $select = "select DayTime from Doctor where Id = '$id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_num_rows($run);
            
            if($row>0){
                $result = mysqli_fetch_array($run);           

                $dtime = $result["DayTime"];
                $ftime = firstTime($dtime);
                $ltime = lastTime($dtime);

                $fHour = hour1($ftime);
                $lHour = hour1($ltime);
                $dMint = mint1($ftime);
                $timearray = array();

                $j = "00";
                for($i=0; $fHour < $lHour; $i++){
                    $timearray[$i] = $fHour.":".$j;
                    if($j == "30"){
                        $j = "00";
                        $fHour +=1;
                    }
                    else{
                        $j = "30";
                    }
                }
                $arrlenght = count($timearray);
                $dataDetails = "<div style='display:inline-block;width:300px;'><select onchange='CheckTime()' class='form-control' name='atime' style='width:250px;display:inline-block' required><option value=''>--Select Appointment Time--</option>";
                
                for($i=0; $i<$arrlenght; $i++){
                    $dataDetails.="<option value='$timearray[$i]'>$timearray[$i]</option>";
                }
                $dataDetails.="</select><i class='fa fa-check' style='color:green;margin-left:5px;' aria-hidden='true' id='check'></i></div>";
            }
        }
        else if(isset($_POST["tpriod"]) == "Night"){
            $id = $_POST['docId'];
            $select = "select NightTime from Doctor where Id = '$id'";
            $run = mysqli_query($con, $select);
            $row = mysqli_num_rows($run);
            
            if($row>0){
                $result = mysqli_fetch_array($run);

                $ntime = $result["NightTime"];
                $ftime = firstTime($ntime);
                $ltime = lastTime($ntime);

                $fHour = hour1($ftime);
                $lHour = hour1($ltime);
                $nMint = mint1($ftime);
                $timearray = array();

                $j = "00";
                for($i=0; $fHour < $lHour; $i++){
                    $timearray[$i] = $fHour.":".$j;
                    if($j == "30"){
                        $j = "00";
                        $fHour +=1;
                    }
                    else{
                        $j = "30";
                    }
                }
                $arrlenght = count($timearray);
                $dataDetails = "<div style='display:inline-block;width:300px;'><select onchange='CheckTime()' class='form-control' name='atime' style='width:250px;display:inline-block' required><option value=''>--Select Appointment Time--</option>";
                for($i=0; $i<$arrlenght; $i++){
                    $dataDetails.="<option value='$timearray[$i]'>$timearray[$i]</option>";
                }
                $dataDetails.="</select><i class='fa fa-check' style='color:green;margin-left:5px;' aria-hidden='true' id='check'></i></div></div>";
            }
        }
        echo $dataDetails;
    }




    function hour1($h){
        $hour = str_split($h,"2");
        $hour = $hour[0];
        return $hour;
    }

    function mint1($m){
        $minut = str_split($m,"3");
        $minut = $minut[1];
        return $minut;
    }

    function firstTime($t){
        $ftime = str_split($t,"5");
        $ftime = $ftime[0];
        return $ftime;
    }

    function lastTime($t){
        $ftime = str_split($t,"6");
        $ftime = $ftime[1];
        return $ftime;
    }
?>
