<?php 

if($_POST['cid'] && $_POST['sem'] && $_POST['year'] && isset($_POST['sid']) ){
    $course = $_POST['cid']."/".$_POST['sem']."/".$_POST['year'];
    $id = $_POST['sid'];
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $query = "INSERT INTO COURSE_STUDENT (course,student_id) VALUES ('$course','$id')";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
if($res==0){
    echo "<script>alert('Unable to insert data! Try Again')</script>";
}

else {
    $query = "DELETE FROM COURSE_INVITE WHERE course='$course' AND student_id='$id'";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<script>alert('Data inserted Successfully')</script>";
}

echo "<script>window.location.href='announcement.php'</script>";

}