<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .content-area {
            display: grid;
            width: 95%;
            min-height: 70vh;
            padding: 10px;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            margin: auto auto;
            position: absolute;
            top: 130px;
        }


        .image {
            grid-column: 1/2;
        }

        .image>img {
            width: 100%;
            height: 100%;
        }

        .course-details {
            grid-column: 2/-1;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        .grade {

            display: flex;
            background-color: rgb(211, 119, 211);
            justify-content: space-evenly;
            align-items: center;
            border-radius: 5px;
            padding: 3px;
        }


        .card {
            width: 12rem;
            min-height: 16rem;
            max-height: 16rem;
        }

        .card-title {
            background-color: black;
            color: white;
            padding-right: 2px;
            padding-top: 2px;
            text-align: center;
            margin-bottom: 4px !important;
            min-height: 50px;
            padding: auto auto;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .card-body {
            padding: 0 !important;
            margin: 0 !important;
            text-align: center;
            background-color: wheat;
        }

        .grade-circle {
            display: inline-block;
            width: 45px;
            height: 45px;
            margin-left: 69px;
            border: 2px solid white;
            text-align: center;
            border-radius: 45px;
            padding-top: 9px;
            position: relative;
            top: 0px;
        }

        span {
            display: inline-block;
        }

        .grade {
            position: relative;
            top: -3px;
            background-color: wheat;

        }

        #heading {
            /* border: 2px solid red; */
            font-size: 1.5rem;
            text-transform: capitalize;
            border: .5px solid;
            padding: 10px;
        }

        .hidden {
            visibility: hidden;
        }

        .collapse {
            visibility: collapse;
        }

        .section {
            min-height: 400px !important;
            max-height: 4000px;
        }

        .image-background {
            width: 45vw;
            height: 80vh;
            /* background-color: black; */
            /* border: 2px solid black; */
            position: relative;
        }

        .image-background img {
            width: 45vw;
            height: 75vh;
            position: fixed;
        }

        footer {
            z-index: 1;
        }
    </style>
</head>

<body>



    <?php require 'navbar.php'; ?>
    <div id="heading">
        your courses
    </div>
    <div class="section">
        <div class="image-background">
            <img src="../images/cover.jpg" alt="image">
        </div>
        <div class="content-area">
            <div class="image">
                <!-- <img src="../images/cover.jpg" alt="image"> -->
            </div>

            <div class="course-details">


                <?php


                $id = $_SESSION['id'];
                $connection = mysqli_connect("localhost", "root", "", "dbms_project") or die("Can't Connect to DB");
                $query = "SELECT * FROM COURSE_STUDENT WHERE student_id='$id'";
                $res = mysqli_query($connection, $query) or die("Can't retreive query");
                while ($row = mysqli_fetch_assoc($res)) {

                    $course = $row['course'];
                    $cDetails = explode("/", $course);
                    $cid = $cDetails[0];
                    $percent = $row['percent'];
                    $grade = $row['grade'];
                    $query1 = "SELECT course_name FROM COURSES WHERE course='$course'";
                    $res1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
                    $row1 = mysqli_fetch_assoc($res1);
                    $course_name = $row1['course_name'];


                    echo "<div class='card' >";
                    echo "<img src='../images/grade2.jpg'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $course_name . "</h5>";
                    echo "<div class='cid'>" . 'Course Id ' . str_repeat('&nbsp;', 10) . $cid . "</div>";
                    echo "<div class='grade'>
                <span> Grade </span>
                <span class='grade-circle'>$percent%</span>
            </div>";
                    echo "</div>";
                    echo "</div>";

                }

                ?>

            </div>
        </div>
    </div>


</body>

</html>