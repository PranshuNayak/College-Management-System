<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            display:flex;
            flex-direction:column;
            height:100vh;
            justify-content:space-between;
        }
       .content-area{
           display:grid;
           width: 95%;
           min-height: 70vh;
          padding: 10px;
          grid-template-columns: repeat(2,1fr);
          grid-gap:20px;
          margin:auto auto;
        }

       
       .image{
           grid-column:1/2;
       }
       .image > img{
           width: 100%;
           height: 100%;
       }

       .course-details{
           grid-column:2/-1;
           display:grid;
           grid-template-columns:repeat(3,1fr);
           grid-gap:20px;
       }

       .course-desc{
           display: grid;
           border: 2px solid rgba(59, 54, 54, 0.068);
           grid-template-rows: repeat(2,1fr);
            border-radius: 10px;
            height:150px;
            
       }

       .grade{
        
        display:flex;
        background-color:rgb(211, 119, 211);
        justify-content: space-evenly;
        align-items: center;
        border-radius: 5px;
        padding: 3px;
       }

    

       .dot{
           display: flex;
           justify-content: center;
           align-items: center;
       }

       .dot > img{
           width: 60%;
           height: 100%;
           
       }

       .per{
           background-color: white;
           padding: 12px;
           border-radius: 20%;
       }

       .desc{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       }
       
    </style>
</head>
<body>

<?php session_start(); ?>
   
    <?php   require 'navbar.php' ?>
    <div class="content-area">
        <div class="image">
            <img src="../images/cover.jpg" alt="image">
        </div>

        <div class="course-details">
           

        <?php 
            
            
            $id = $_SESSION['id'];
            $connection = mysqli_connect("localhost","root","","dbms_project") or die("Can't Connect to DB");
            $query = "SELECT * FROM COURSE_STUDENT WHERE student_id='$id'";
            $res = mysqli_query($connection,$query) or die("Can't retreive query");
            while($row = mysqli_fetch_assoc($res)){

                $course_id = $row['course_id'];
                $percent = $row['Percent'];
                $query_1 = "SELECT course_name FROM COURSES WHERE course_id='$course_id'";
                $res_1 = mysqli_query($connection,$query_1);
                $row_1 = mysqli_fetch_assoc($res_1);
                $course_name = $row_1['course_name'];

                echo "<div class='course-desc'>";
                echo "<div class='grade'>";
                echo "<div class='per'>".$percent."%"."</div>";
                echo "<div class='dot'>";
                echo "<img src='../images/more.png'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='desc'>";
                echo "<div class='cname'>".$course_name."</div>";
                echo "<div class='cid'>".$course_id."</div>";
                echo "</div>";
                echo "</div>";
            }
            
            ?>
        
        </div>
        </div>

    <?php require '../footer.php' ?>
</body>
</html>