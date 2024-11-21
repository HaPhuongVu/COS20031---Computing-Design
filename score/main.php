<?php

$host = "localhost";
$username = "root";
$password = "Phg1212.";
$db = "archery";

$enteredArcher = "";
$enteredFace = "";
$enteredDistance = "";

$conn = mysqli_connect($host, $username, $password, $db);
if($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}


$roundName = readRoundName($conn);
$archerName = readArcherInfo($conn);
$defaultEquipment = readDefaultEquipment($conn);

//read all rounds
function readRoundName($conn){
    $sql = "Select name from round";
    $result = $conn->query($sql);
    return $result;
}

// read archer info
function readArcherInfo($conn){
    $sql = "Select name from archer";
    $result = $conn->query($sql);
    return $result;
}

// return default equipment
function readDefaultEquipment($conn){
    $sql = "Select type from equipment";
    $result = $conn->query($sql);
    return $result;
}
?>