<?php 

if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['sem']) && isset($_POST['id']) ){
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $id = $_POST['id'];
    $course = strtoupper($_POST['cid'])."/".$_POST['sem']."/".$_POST['year'];
    $query = "INSERT INTO REVIEW_COURSE(course,teacher_id,approved) VALUES ('$course','$id',0)";
    $res = mysqli_query($con,$query);
    if($res==0){
        echo "<script>alert('Unable to register course for review!')</script>";
    }
    else echo "<script>alert('Course Registration Sent for review!')</script>";
    echo "<script>window.location.href='../Teacher/register_courses.php'</script>";
}
?>