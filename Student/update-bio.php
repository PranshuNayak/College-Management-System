<?php 
session_start();
if(isset($_POST['bio'])){
    $id = $_SESSION['id'];
    $bio = $_POST['bio'];
    $connection = mysqli_connect("localhost","root","","dbms_project") or die("Unable to setup connection");

    $query = "UPDATE STUDENT SET student_bio='$bio' WHERE student_id='$id'";
    $res = mysqli_query($connection,$query) or die("Can't fetch your query");
    
    echo '<script>alert("Changes updated successfully")</script>';
    echo'<form action="account.php" method="post"><button type="submit" id="btn"></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{document.getElementById("btn").click()})</script>';
    
}

?>