<?php 

session_start();
if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['deadline']) && isset($_POST['sem']) && isset($_POST['title'])  && isset($_POST['desc']) ){

    $course = $_POST['cid']."/".$_POST['sem']."/".$_POST['year'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $deadline = $_POST['deadline'];
    $dateobj = getdate();
    $date = $dateobj['mday']."/".$dateobj['mon']."/".$dateobj['year'];
    $time = $dateobj['hours'].":".$dateobj['minutes'].":".$dateobj['seconds'];

if(isset($_POST['link'])){
    $link = $_POST['link'];
}

else $link = NULL;

$connection = mysqli_connect("localhost","root","","dbms_project") or die("Unbale to connect to db");
$query = "INSERT INTO ASSIGNMENT (course,TITLE,DESCRIPTION,assignment_day,assignment_time,assignment_deadline,assignment_link) VALUES ('$course','$title','$desc','$date','$time','$deadline','$link')";
$res = mysqli_query($connection,$query) or die(mysqli_error($connection));
if($res==0){
    echo "<script>alert('Unable to insert data! Try Again')</script>";
}

else echo "<script>alert('Data inserted Successfully')</script>";

echo "<script>window.location.href='courses-dashboard.php'</script>";

}

else  echo "<script>alert('Unable to insert data! Try Again')</script>";


?>