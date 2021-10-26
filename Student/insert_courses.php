<?php
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $course = strtoupper($_POST['cid'])."/".$_POST['sem']."/".$_POST['year'];
    $id = $_SESSION['id'] ;
    $query = "INSERT INTO COURSE_STUDENT(course,student_id) VALUES ('$course','$id')";
    $res = mysqli_query($con,$query);
    if($res==1){
      echo "<script>alert('Sucessfully registered')</script>";
    }
    else echo "<script>alert('You are already registered')</script>";
    echo "<script>window.location.href='announcement.php'</script>";
    ?>