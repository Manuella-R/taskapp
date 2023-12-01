<?php

if(isset($_POST['Task_Name'])){
    require 'config.php';

    $title = $_POST['Task_Name'];

    if(empty($title)){
        header("Location: ../home.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO User_Task(UserID, Type_Id, Task_Name ) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: home.php?page=homepage"); 
        }else {
            header("Location: home.php?page=homepage");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../home.php?mess=error");
}