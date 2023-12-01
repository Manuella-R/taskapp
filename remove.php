<?php

if(isset($_POST['Task_Id'])){
    require 'config.php';

    $id = $_POST['Task_Id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $conn->prepare("DELETE FROM User_Task WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location:home.php?mess=error");
}