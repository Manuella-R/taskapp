<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['Task_Id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $conn->prepare("SELECT Task_Name checked FROM User_Task WHERE Task_Id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['Task_Id'];
        $checked = $todo['Status'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE User_Task SET Status=$uChecked WHERE Task_Id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: home.php?mess=error");
}