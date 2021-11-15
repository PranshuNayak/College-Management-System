<?php 

if(isset($_POST['course']) && isset($_POST['sids'])){
    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $course = ($_POST['course']);
    $students = $_POST['sids'];
    $dateobj = getdate();
    $date = $dateobj['mday']."/".$dateobj['mon']."/".$dateobj['year'];
        $time = $dateobj['hours'].":".$dateobj['minutes'].":".$dateobj['seconds'];
        $title = "Course Inviation";
        $desc = "Dear Students please accept the course invitation for ".$course;
    
    if(strpos($students,"/")){
        $student = explode("/",$students);
        for ($i=0; $i <sizeof($student) ; $i++) { 
            $stu = $student[$i];
            $query = "INSERT INTO COURSE_INVITE (course,student_id,TITLE,DESCRIPTION,annoucement_time,annoucement_day) VALUES ('$course','$stu','$title','$desc','$time','$date')";
             $res = mysqli_query($con,$query) ;
             if($res){
                echo "<script>alert('Invitation sent Successfully')</script>";
                echo "<script>window.location.href='course_invitation.php'</script>'";
               
                }else{
                    echo "<script>alert('Unable to send Invitation')</script>";
                echo "<script>window.location.href='select_students.php'</script>'";
                }
     }
      
        
    }
    else{
        $query = "INSERT INTO COURSE_INVITE (course,student_id,TITLE,DESCRIPTION,annoucement_time,annoucement_day) VALUES ('$course','$students','$title','$desc','$time','$date')";
        $res = mysqli_query($con,$query);
            
        if($res){
            echo "<script>alert('Invitation sent Successfully')</script>";
            echo "<script>window.location.href='course_invitation.php'</script>'";
           
            }else{
                echo "<script>alert('Unable to send Invitation')</script>";
            echo "<script>window.location.href='select_students.php'</script>'";
            }
        
    }
}

?>