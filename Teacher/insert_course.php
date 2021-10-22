<?php 
session_start();
if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['sem'])){
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $course = strtoupper($_POST['cid'])."/".$_POST['sem']."/".$_POST['year'];
    $id = $_SESSION['id'];
    $query = "INSERT INTO COURSE_TAUGHT(course,teacher_id) VALUES ('$course','$id')";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<script>alert('You are succesfully registered')</script>";
    echo "<script>window.location.href='register_courses.php'</script>";
}
?>