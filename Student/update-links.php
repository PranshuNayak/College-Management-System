<?php 

session_start();
$connection = mysqli_connect("localhost","root","","dbms_project") or die("Unable to establish connection");
$id = $_SESSION['id'];

if($_POST['github'] && $_POST['linkedin']){
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $query = "UPDATE STUDENT SET student_github='$github',student_linkedin='$linkedin' WHERE student_id='$id'";
    $res = mysqli_query($connection,$query) or die("unable to proceed query");
    echo '<script>alert("Changes updated successfully")</script>';
}

else if($_POST['github']){
    $github = $_POST['github'];
    $query = "UPDATE STUDENT SET student_github='$github' WHERE student_id='$id'";
    $res = mysqli_query($connection,$query) or die("unable to proceed query");
    echo '<script>alert("Changes updated successfully")</script>';
}

else if($_POST['linkedin']){
    $linkedin = $_POST['linkedin'];
    $query = "UPDATE STUDENT SET student_github='$linkedin' WHERE student_id='$id'";
    $res = mysqli_query($connection,$query) or die("unable to proceed query");
    echo '<script>alert("Changes updated successfully")</script>';
}

else{
    echo '<script>alert("You Added Nothing New")</script>';
}

echo'<form action="account.php" method="post"><button type="submit" id="btn"></form>';
echo '<script>document.addEventListener("DOMContentLoaded",()=>{document.getElementById("btn").click()})</script>';

?>