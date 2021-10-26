<?php

if(isset($_POST['row'])){
    $con = mysqli_connect("localhost","root","","dbms_project");
    $to_ctaught = $_POST['row'];

    if(!strpos($to_ctaught,"*")){
        $teacher = explode("-",$to_ctaught);
        $query = "INSERT INTO COURSE_TAUGHT(course,teacher_id) VALUES ('$teacher[0]','$teacher[1]')";
       
        $res = mysqli_query($con,$query) or die(mysqli_error($con));
        if($res==0){
            echo "<script>alert('Unable to approve course')</script>";
            echo "<script>window.location.href='admit_course.php'</script>";
        }

        else{
            $query_remove = "UPDATE REVIEW_COURSE SET approved=1 WHERE course='$teacher[0]' AND teacher_id='$teacher[1]'";
            $res = mysqli_query($con,$query_remove) or die(mysqli_error($con));
            echo "<script>alert('Courses approved successfully')</script>";
            echo "<script>window.location.href='admit_course.php'</script>";
        }
    }

    else{

        $teachers = explode("*",$to_ctaught);
        for($i=0;$i<sizeof($teachers);$i++){
            $teacher = explode("-",$teachers[$i]);
            $query = "INSERT INTO COURSE_TAUGHT(course,teacher_id) VALUES ('$teacher[0]','$teacher[1]')";
             $res = mysqli_query($con,$query);
        if($res==0){
            echo "<script>alert('Unable to approve course')</script>";
            echo "<script>window.location.href='admit_course.php'</script>";
        }

        else{
            $query_remove = "UPDATE REVIEW_COURSE SET approved=1 WHERE course='$teacher[0]' AND teacher_id='$teacher[1]'";
            $res = mysqli_query($con,$query_remove) or die(mysqli_error($con));
            
        }
        
        }

        echo "<script>alert('Courses approved successfully')</script>";
            echo "<script>window.location.href='admit_course.php'</script>";
        

    }
}

?>