<?php 

session_start();
if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['semester']) && isset($_POST['title'])  && isset($_POST['desc']) ){
$course = $_POST['cid']."/".$_POST['semester']."/".$_POST['year'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$dateobj = getdate();
$date = $dateobj['mday']."/".$dateobj['mon']."/".$dateobj['year'];
$time = $dateobj['hours'].":".$dateobj['minutes'].":".$dateobj['seconds'];
$connection = mysqli_connect("localhost","root","","dbms_project") or die("Unbale to connect to db");
$query = "INSERT INTO ANNOUCEMENT (course,TITLE,DESCRIPTION,annoucement_time,annoucement_day) VALUES ('$course','$title','$desc','$time','$date')";
$res = mysqli_query($connection,$query) or die(mysqli_error($connection));
if($res==0){
    echo "<script>alert('Unable to insert data! Try Again')</script>";
}

else echo "<script>alert('Data inserted Successfully')</script>";

echo "<script>window.location.href='courses-dashboard.php'</script>";

}

else  echo "<script>alert('Unable to insert data! Try Again')</script>";


?>