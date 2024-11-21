<?php
error_reporting(0);
require "main.php";

$round2 = "";
$distanceList = array(90, 70, 60, 50, 40, 30, 72, 144, 100, 80, 110, 120, 130);
$selectedDistance = "";
$currentDistance = "";
$currentFace = "";
$maxEndNumber = 6;
$currentId = "1";
$rangeID = "1";
$arrowIndex = 1;

if(isset($_POST["archerName"]) && isset($_POST["equipmentName"]) && isset($_POST["roundName"])){
    echo $_POST['archerName'];
    $round2 = $_POST["roundName"];
}
if(
    isset($_POST["arrow1"]) &&
    isset($_POST["arrow2"]) &&
    isset($_POST["arrow3"]) &&
    isset($_POST["arrow4"]) &&
    isset($_POST["arrow5"]) &&
    isset($_POST["arrow6"])
)
{
    if(
        !is_numeric($_POST["arrow1"]) ||
        !is_numeric($_POST["arrow2"]) ||
        !is_numeric($_POST["arrow3"]) ||
        !is_numeric($_POST["arrow4"]) ||
        !is_numeric($_POST["arrow5"]) ||
        !is_numeric($_POST["arrow6"])
    ){
        echo "Only number from 1-10";
        return;
    };
    $endNumber = $_POST["endNumber"];
    echo "End Number: " .$endNumber ."/" .$maxEndNumber;
    $listArrow = array($_POST["arrow1"], $_POST["arrow2"], $_POST["arrow3"], $_POST["arrow4"], $_POST["arrow5"], $_POST["arrow6"]);

    function queryRoundDetail(){
        global $distanceList;
        global $round2;
        global $connection;
        global $selectedDistance;
        global $currentDistance;
        global $currentFace;
        global $maxEndNumber;

        $sql = "Select name from round WHERE name = '$round2";
        $result = $connection->query($sql);

        while($row = $result->fetch_array(MYSQLI_BOTH)){
            for($i = 0; $i < count($row); $i++){
                if($row[$distanceList[$i]]){
                    array_push($selectedDistance, $distanceList[$i] );
                    if($currentDistance==""){
                        $currentDistance = $distanceList[$i];
                    }
                    $currentFace = convertFace($row[$distanceList[$i]]);
                    $maxEndNumber=
                }
            }
        }
    }

    function convertFace($face){
        if($face==1){

        }
    }
}
?>