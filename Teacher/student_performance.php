<?php require 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>

    <style>
        :root {
            --gold: #c59d5f;
            --transition: 0.3s ease-in-out all;
            box-sizing: border-box;
        }

        #heading {
            /* border: 2px solid red; */
            font-size: 1.5rem;
            text-transform: capitalize;
            border: .5px solid;
            padding: 10px;
        }

        .content-area {
            display: block;
            padding: 10px;
            grid-gap: 20px;
            margin: auto auto;
            /* border: 2px solid red; */
        }

        /* .content-area::before{
          content: "";
          background: url("../images/cover.jpg");
          width: 200px;
          height: 200px;
      } */

        .image {
            grid-row: 1/3;
            grid-column: 1/2;
            /* visibility: hidden; */
        }

        .image>img {
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
        }

        h3 {
            text-align: center;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: center;
            /* table-layout: auto; */
        }

        table {
            border-collapse: collapse;
            width: 65vw;
            margin-top: 75px;
            margin: auto;
        }

        th,
        td {
            padding: 15px;
        }

        th {
            padding: 23px;
        }

        .name {
            max-width: 260px;
            min-width: 100px;
            box-sizing: border-box;
            /* border: 2px solid red; */
            padding: 0px;
            padding-left: 5px;
            /* text-align: left; */
        }

        section {
            padding: 10px;
            /* border: 2px solid red; */
            /* position: relative; */
            min-height: 457px !important;
        }

        .head {
            background-color: black;
            color: white;
        }

        .footer {
            position: relative;
            top: 1vh;
        }

        .container {
            width: 730px;
            text-align: center;
            margin: auto !important;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_POST['cdetails'])) {
        $course = $_POST['cdetails'];

        $con = mysqli_connect("localhost", "root", "", "dbms_project") or die(mysqli_error($con));
        $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
        $res_cname = mysqli_query($con, $query_cname);
        $row_cname = mysqli_fetch_assoc($res_cname);
        $cname = $row_cname['course_name'];

        echo "<div id='heading'>$course - $cname</div>";
        echo "<section>";
        echo "<div class='content-area'>";
        echo "<table>";
        echo "<tr class='head'>";
        echo "<th class='count'>S.No</th>";
        echo "<th class='sname'>Name</th>";
        echo "<th class='id'>Roll No.</th>";
        echo "<th class='email'>Email</th>";
        echo "<th class='percent'>Percent</th>";
        echo "<th class='grade'>Grade</th>";
        echo "</tr>";
        $query = "SELECT STUDENT.student_id AS sid ,student_name,student_email,grade,percent FROM COURSE_STUDENT,STUDENT WHERE COURSE_STUDENT.student_id=STUDENT.student_id AND course='$course'";
        $res = mysqli_query($con, $query) or die(mysqli_error($con));
        $count = 0;
        while ($row = mysqli_fetch_assoc($res)) {
            $count++;
            $name = $row['student_name'];
            $id = $row['sid'];
            $email = $row['student_email'];
            $percent = $row['percent'];
            $grade = $row['grade'];

            echo "<tr class='row-entry'>";
            echo "<td class='count'>$count</td>";
            echo "<td class='name'>$name</td>";
            echo "<td class='id'>$id</td>";
            echo "<td class='email'>$email</td>";
            echo "<td class='percent'>$percent</td>";
            echo "<td class='grade'>$grade</td>";
            echo "</tr>";
        }
        if ($count == 0) {
            echo "</table>";
            echo '<div class="container"><img src="../images/panda.jpg" width="700px" height="535px"></div>';
        }
        echo "</table>";
        echo "</div>";
        echo "</section>";
    }
    ?>
</body>
<div class="footer">
    <?php
    require '../footer.php';
    ?>
</div>

</html>