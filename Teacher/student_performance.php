<?php require 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <style>
        .course-details{
            display:flex;
            flex-direction:column;
            min-height:80vh;
            width:80vw;
            margin:0 auto;
        }
        .row{
            display:grid;
            grid-template-columns:repeat(6,1fr)
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="course-details">
        
<?php
if(isset($_POST['cdetails'])){
    $course = $_POST['cdetails'];

    $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
    $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
          $res_cname = mysqli_query($con,$query_cname);
          $row_cname = mysqli_fetch_assoc($res_cname);
          $cname = $row_cname['course_name'];
        
          echo "<h2>$course - $cname</h2>";
          echo "<div class='row'>";
        echo "<div class='count'>S.No</div>";
        echo "<div class='name'>Name</div>";
        echo "<div class='id'>Roll No.</div>";
        echo "<div class='email'>Email</div>";
        echo "<div class='percent'>Percent</div>";
        echo "<div class='grade'>Grade</div>";
        echo "</div>";
    $query = "SELECT STUDENT.student_id AS sid ,student_name,student_email,grade,percent FROM COURSE_STUDENT,STUDENT WHERE COURSE_STUDENT.student_id=STUDENT.student_id AND course='$course'";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
    $count = 0;
    while($row = mysqli_fetch_assoc($res)){
        $count++;
        $name = $row['student_name'];
        $id = $row['sid'];
        $email = $row['student_email'];
        $percent = $row['percent'];
        $grade = $row['grade'];

        echo "<div class='row'>";
        echo "<div class='count'>$count</div>";
        echo "<div class='name'>$name</div>";
        echo "<div class='id'>$id</div>";
        echo "<div class='email'>$email</div>";
        echo "<div class='percent'>$percent</div>";
        echo "<div class='grade'>$grade</div>";
        echo "</div>";

    }

}
?>
</div>
</body>
</html>
