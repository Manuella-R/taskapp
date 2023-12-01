<?php 
require_once('db-connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.');</script>";
    echo "<script> window.location.href = './home.php?page=calen.php'; </script>";
    exit; 
    
}

$delete = $conn->query("DELETE FROM `schedule_list` where schedule_id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}


?>