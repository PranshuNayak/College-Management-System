<?php

if(isset($_POST['cid']) && isset($_POST['cname']) && isset($_POST['semester']) && isset($_POST['year']) ){
    $con = mysqli_connect("localhost","root","","dbms_project");
    $course = $_POST['cid']."/".$_POST['semester']."/".$_POST['year'];
    $cname = $_POST['cname'];
    $query = "INSERT INTO COURSES(course,course_name) VALUES('$course','$cname')";
    $res = mysqli_query($con,$query);
    
    if($res==0){
        echo "<script>alert('Unable to add course')</script>";
        echo "<script>window.location.href='add_course.php'</script>";
    }

    else{
        echo "<script>alert('Course added successfully')</script>";
        echo "<script>window.location.href='add_course.php'</script>";
    }
}


?>