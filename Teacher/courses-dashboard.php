<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="courses-dashboard.css">
    <style>
      body {
        display: flex;
        flex-direction: column;
        height: 100vh;
        justify-content: space-between;
      }
      .content-area {
        display: grid;
        width: 95vw;
        min-height: 70vh;
        padding: 10px;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-gap: 20px;
        margin: auto auto;
      }

      .image {
        grid-row: 1/3;
        grid-column: 1/2;
      }
      .image > img {
        width: 100%;
        height: 100%;
      }

      .course-desc {
        grid-column: 2/3;
        grid-row: 1/3;
        width: 100%;
        display: flex;
        flex-direction:column;
        border: 2px solid rgba(59, 54, 54, 0.068);
      }


      .desc{
          display:flex;
  
          margin:7px 0px;
          justify-content: space-evenly;
          border-bottom:0.5px solid #f4f4f4;
      }

      h3{
        text-align:center;
      }

      

      .header{
        background-color:black;
        color:white;
        
      }
    </style>
  </head>
  <body>
    <?php session_start(); ?>
    <?php   require 'navbar.php' ?>
    <div><h3>Courses You teach</h3></div>
    <div class="content-area">
      <div class="image">
        <img src="../images/cover.jpg" alt="image" />
      </div>

      <div class="course-desc">
      <div class="desc header">
            <div class="snum">S.No</div>
          <div class="cname">Course Name</div>
          <div class="cid">Course ID</div>
          <div class="year">Year</div>
          <div class="semester">Semester</div>
        </div>

        <?php 
        
        $tid = $_SESSION['id'];
        $connection = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($connection));
        $query = "SELECT * FROM COURSE_TAUGHT WHERE teacher_id='$tid'";
        $count=0;
        $res = mysqli_query($connection,$query) or die(mysqli_error($connection));
        while($row=mysqli_fetch_assoc($res)){
          $count++;
          $course = $row['course'];
          $cdetails = explode("/",$course);
          $cid = $cdetails[0];
          $sem = $cdetails[1];
          $year = $cdetails[2];
          $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
          $res_cname = mysqli_query($connection,$query_cname);
          $row_cname = mysqli_fetch_assoc($res_cname);
          $cname = $row_cname['course_name'];
          $rowId = "row".$count;
          echo "<div class='desc' id='$rowId'>";
          echo "<div class='snum'>$count</div>";
          echo "<div class='cname rowdata'>$cname</div>";
          echo "<div class='cid'>$cid</div>";
          echo "<div class='year'>$year</div>";
          echo "<div class='semester'>$sem</div>";
          echo "<button class='annoucement' onclick='sendAN($rowId)'>Make Annoucement</button>";
          echo "<button class='assignment' onclick='sendAS($rowId)' >Make Assignment</button>";
          echo "<button class='sDetails' onclick='sendSP($rowId)'>Student Performance</button>";
          echo "</div>";
        }
        ?>
      </div>
    </div>

    <?php require '../footer.php' ?>
    
  </body>
  <script>

        let sendSP = (course)=>{
          console.log("hello");

          let cdetails = course.childNodes;
          let key = cdetails[2].innerHTML+"/"+cdetails[4].innerHTML+"/"+cdetails[3].innerHTML;
          let form = document.createElement('form');
          form.setAttribute('action','student_performance.php');
          form.setAttribute('method','POST');
          let input = document.createElement('input');
          input.setAttribute('type','text');
          input.setAttribute('name','cdetails');
          input.setAttribute('value',key);

          let submit = document.createElement('input');
          submit.setAttribute('type','submit');

          form.style.display="none";

          form.append(input);
          form.append(submit);
          document.body.append(form);
          submit.click();
        }

    let sendAN = (course)=>{
      let course_details = course.childNodes;
      let cid = course_details[2].innerHTML;
      let year = course_details[3].innerHTML;
      let semester = course_details[4].innerHTML;
      
      let form = document.createElement('form');
      form.setAttribute("action","announcement.php");
      form.setAttribute("method","post");

      let cID = document.createElement('input');
      cID.setAttribute("type","text");
      cID.setAttribute("name","cid");
      cID.setAttribute("value",cid);
      
      let yr = document.createElement('input');
      yr.setAttribute("type","number");
      yr.setAttribute("name","year");
      yr.setAttribute("value",year);

      let sem = document.createElement('input');
      sem.setAttribute("type","number");
      sem.setAttribute("name","sem");
      sem.setAttribute("value",semester);

      let submit = document.createElement('input');
      submit.setAttribute("type","submit");
      
      
      form.append(cID);
      form.append(yr);
      form.append(sem);
      form.append(submit);
      form.style.display="none";
      document.body.append(form);
      submit.click();

    }

    let sendAS = (course)=>{
      let course_details = course.childNodes;
      let cid = course_details[2].innerHTML;
      let year = course_details[3].innerHTML;
      let semester = course_details[4].innerHTML;
      
      let form = document.createElement('form');
      form.setAttribute("action","assignment.php");
      form.setAttribute("method","post");

      let cID = document.createElement('input');
      cID.setAttribute("type","text");
      cID.setAttribute("name","cid");
      cID.setAttribute("value",cid);
      
      let yr = document.createElement('input');
      yr.setAttribute("type","number");
      yr.setAttribute("name","year");
      yr.setAttribute("value",year);

      let sem = document.createElement('input');
      sem.setAttribute("type","number");
      sem.setAttribute("name","sem");
      sem.setAttribute("value",semester);

      let submit = document.createElement('input');
      submit.setAttribute("type","submit");
      
      
      form.append(cID);
      form.append(yr);
      form.append(sem);
      form.append(submit);
      form.style.display="none";
      document.body.append(form);
      submit.click();

    }
  </script>
</html>
