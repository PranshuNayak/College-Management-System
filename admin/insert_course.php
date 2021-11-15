<?php

if(isset($_POST['cid']) && isset($_POST['cname']) && isset($_POST['semester']) && isset($_POST['year']) ){
    $con = mysqli_connect("localhost","root","","dbms_project");
    $course = $_POST['cid']."/".$_POST['semester']."/".$_POST['year'];
    
    //semester and year vairable
    $sem = $_POST['semester'];
    $year = $_POST['year'];
    $dateObj = getdate();
    $cur_year = $dateObj['year'];

    if($year < $cur_year || $sem<0 || $sem>9 ){
        echo "<script>alert('Wrong Credentials for year or semester')</script>";
        echo "<script>window.location.href='add_course.php'</script>";
        end();
    }

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