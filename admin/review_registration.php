<?php 

if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['sem']) && isset($_POST['id']) ){
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $id = $_POST['id'];
    $course = strtoupper($_POST['cid'])."/".$_POST['sem']."/".$_POST['year'];

    //semester and year vairable
    $sem = $_POST['sem'];
    $year = $_POST['year'];
    $dateObj = getdate();
    $cur_year = $dateObj['year'];

    if($year < $cur_year || $sem<0 || $sem>9 ){
        echo "<script>alert('Wrong Credentials for year or semester')</script>";
        echo "<script>window.location.href='../Teacher/register_courses.php'</script>";
        end(); 
    }

    $query = "INSERT INTO REVIEW_COURSE(course,teacher_id,approved) VALUES ('$course','$id',0)";
    $res = mysqli_query($con,$query);
    if($res==0){
        echo "<script>alert('Unable to register course for review!')</script>";
    }
    else echo "<script>alert('Course Registration Sent for review!')</script>";
    echo "<script>window.location.href='../Teacher/register_courses.php'</script>";
}
?>