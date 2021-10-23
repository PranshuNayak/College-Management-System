<?php 
session_start();
if($_POST['cur_pas'] && $_POST['new_pas1'] && $_POST['new_pas2']){

    if($_POST['new_pas1']!=$_POST['new_pas2']){
        echo '<script>alert("Enter same password in the update field")</script>';
        session_unset();
        session_abort();
        echo'<form action="account.php" method="post"><button type="submit" id="btn"></form>';
        echo '<script>document.addEventListener("DOMContentLoaded",()=>{document.getElementById("btn").click()})</script>';
        die();
    }

    $connection = mysqli_connect("localhost","root","","dbms_project") or die("Can't connect to database");
    $q_stu = "SELECT * FROM TEACHER";
    $res_stu = mysqli_query($connection,$q_stu) or die("Can't fetch your query");
    $s_id = 0;
 
    $pass = $_POST['new_pas1'];

    while($row = mysqli_fetch_assoc($res_stu)){
        if($row['teacher_email']==$_SESSION['email'] && $row['teacher_password']==$_POST['cur_pas']){
            $s_id = $row['teacher_id'];
            break;
        }
    }

    if($s_id!=0){
        $q_update = "UPDATE TEACHER SET teacher_password='$pass' WHERE teacher_id = '$s_id' ";
        $res = mysqli_query($connection,$q_update) or die("Unable to upadte password");
        echo '<script>alert("Changes updated successfully")</script>';
        session_unset();
    session_abort();
        echo'<form action="account.php" method="post"><button type="submit" id="btn"></form>';
        echo '<script>document.addEventListener("DOMContentLoaded",()=>{document.getElementById("btn").click()})</script>';
    }

    else {
        echo '<script>alert("Unable to update password because of invalid credentials")</script>';
        session_unset();
    session_abort();
    echo'<form action="account.php" method="post"><button type="submit" id="btn"></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{document.getElementById("btn").click()})</script>';
    }

    
}

?>