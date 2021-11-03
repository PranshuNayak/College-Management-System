<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <title>Document</title>
    <link rel="stylesheet" href="courses-dashboard.css">
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
            width: 75vw;
            margin-top: 75px;
            margin: auto;
        }

        th,
        td {
            padding: 15px;
        }

        .question-btn {
            font-size: 1.5rem;
            background: transparent;
            border-color: transparent;
            cursor: pointer;
            color: var(--gold);
            transition: var(--transition);
        }

        .question-btn:hover {
            /* transform: rotate(90deg); */
            color: blue;
        }

        .cname {
            max-width: 260px;
            min-width: 150px;
            box-sizing: border-box;
            /* border: 2px solid red; */
            padding: 0px;
            padding-left: 5px;
            text-align: left;
        }

        section {
            padding: 10px;
            /* border: 2px solid red; */
            /* position: relative; */
            min-height: 462px !important;
        }

        .head {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <?php require 'navbar.php' ?>
    <div id="heading">
        courses you teach
    </div>
    <section>
        <div class="content-area">
            <!-- <div class="image">
                <img src="../images/cover.jpg" alt="image" />
            </div> -->

            <table>
                <tr class="head">
                    <th>S.No</th>
                    <th>Course Name</th>
                    <th>Course Id</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Student performance</th>
                    <th>Announcement</th>
                    <th>Assignment</th>
                </tr>

                <?php

                $tid = $_SESSION['id'];
                $connection = mysqli_connect("localhost", "root", "", "dbms_project") or die(mysqli_error($connection));
                $query = "SELECT * FROM COURSE_TAUGHT WHERE teacher_id='$tid'";
                $count = 0;
                $res = mysqli_query($connection, $query) or die(mysqli_error($connection));
                while ($row = mysqli_fetch_assoc($res)) {
                    $count++;
                    $course = $row['course'];
                    $cdetails = explode("/", $course);
                    $cid = $cdetails[0];
                    $sem = $cdetails[1];
                    $year = $cdetails[2];
                    $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
                    $res_cname = mysqli_query($connection, $query_cname);
                    $row_cname = mysqli_fetch_assoc($res_cname);
                    $cname = $row_cname['course_name'];
                    $rowId = "row" . $count;
                    echo "<tr class='row-entry' id='$rowId'>";
                    echo "<td class='snum'>$count</td>";
                    echo "<td class='cname rowdata'>$cname</td>";
                    echo "<td class='cid'>$cid</td>";
                    echo "<td class='year'>$year</td>";
                    echo "<td class='semester'>$sem</td>";
                    echo '<td><button class="question-btn sDetails" onclick="sendAN($rowId)">
                        <span class="plus-icon">
                            <i class="fas fa-user-graduate"></i>
                        </span>
                    </button></td>';
                    echo ' <td><button class="question-btn announcement" onclick="sendAN($rowId)">
                        <span class="plus-icon">
                            <i class="far fa-plus-square"></i>
                        </span>
                    </button></td>';
                    echo ' <td><button class="question-btn assignment" onclick="sendAN($rowId)">
                        <span class="plus-icon">
                            <i class="far fa-plus-square"></i>
                        </span>
                    </button></td>';
                    echo "</tr>";
                }
                ?>
            </table>

        </div>
    </section>

</body>
<footer>
    <?php
    require '../footer.php';
    ?>
</footer>
<script>
    let sendSP = (course) => {
        console.log("hello");

        let cdetails = course.childNodes;
        let key = cdetails[2].innerHTML + "/" + cdetails[4].innerHTML + "/" + cdetails[3].innerHTML;
        let form = document.createElement('form');
        form.setAttribute('action', 'student_performance.php');
        form.setAttribute('method', 'POST');
        let input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'cdetails');
        input.setAttribute('value', key);

        let submit = document.createElement('input');
        submit.setAttribute('type', 'submit');

        form.style.display = "none";

        form.append(input);
        form.append(submit);
        document.body.append(form);
        submit.click();
    }

    let sendAN = (course) => {
        let course_details = course.childNodes;
        let cid = course_details[2].innerHTML;
        let year = course_details[3].innerHTML;
        let semester = course_details[4].innerHTML;

        let form = document.createElement('form');
        form.setAttribute("action", "announcement.php");
        form.setAttribute("method", "post");

        let cID = document.createElement('input');
        cID.setAttribute("type", "text");
        cID.setAttribute("name", "cid");
        cID.setAttribute("value", cid);

        let yr = document.createElement('input');
        yr.setAttribute("type", "number");
        yr.setAttribute("name", "year");
        yr.setAttribute("value", year);

        let sem = document.createElement('input');
        sem.setAttribute("type", "number");
        sem.setAttribute("name", "sem");
        sem.setAttribute("value", semester);

        let submit = document.createElement('input');
        submit.setAttribute("type", "submit");


        form.append(cID);
        form.append(yr);
        form.append(sem);
        form.append(submit);
        form.style.display = "none";
        document.body.append(form);
        submit.click();

    }

    let sendAS = (course) => {
        let course_details = course.childNodes;
        let cid = course_details[2].innerHTML;
        let year = course_details[3].innerHTML;
        let semester = course_details[4].innerHTML;

        let form = document.createElement('form');
        form.setAttribute("action", "assignment.php");
        form.setAttribute("method", "post");

        let cID = document.createElement('input');
        cID.setAttribute("type", "text");
        cID.setAttribute("name", "cid");
        cID.setAttribute("value", cid);

        let yr = document.createElement('input');
        yr.setAttribute("type", "number");
        yr.setAttribute("name", "year");
        yr.setAttribute("value", year);

        let sem = document.createElement('input');
        sem.setAttribute("type", "number");
        sem.setAttribute("name", "sem");
        sem.setAttribute("value", semester);

        let submit = document.createElement('input');
        submit.setAttribute("type", "submit");


        form.append(cID);
        form.append(yr);
        form.append(sem);
        form.append(submit);
        form.style.display = "none";
        document.body.append(form);
        submit.click();

    }
</script>

</html>