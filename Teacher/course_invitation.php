<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .course-invitation{
        display:flex;
        flex-direction:column;
        min-height:80vh;
        width:50%;
        margin:0 auto;
      }

      .course{
        display:grid;
        grid-template-columns:repeat(5,1fr);
      }
    </style>
  </head>
  <body>
    <?php session_start() ?>
    <?php include 'navbar.php' ?>
    <div class="course-invitation">
     <div class="course">
       <div class="sno">S.No</div>
     <div class="cid">Course ID</div>
      <div class="sem">Semester</div>
      <div class="year">Year</div>
      <div class="invite">Status</div>
     </div>
      <?php
      $id = $_SESSION['id'];
    $con = mysqli_connect("localhost","root","","dbms_project");
    $query = "SELECT * FROM COURSE_TAUGHT WHERE teacher_id='$id' AND COURSE_INVITE_SENT=0";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
    $count=0;
    while($row = mysqli_fetch_assoc($res)){
      $count++;
      $course = $row['course'];
      $cdetails = explode("/",$course);
      $cid = $cdetails[0];
      $sem = $cdetails[1];
      $year = $cdetails[2];
      echo "<div class='course' id='$count'>";
      echo "<div class='sno'>$count</div>";
      echo "<div class='cid'>$cid</div>";
      echo "<div class='sem'>$sem</div>";
      echo "<div class='year'>$year</div>";
      echo "<button onclick='makeInvite($count)'>Send Invite</button>";
      echo "</div>";
    }
    if($count==0){
      echo '<div class="container"><img src="../images/panda.jpg" width="700px" height="535px"></div>';
    }

?>
    </div>
    <?php include '../footer.php' ?>;
  </body>
  <script>
    let makeInvite = (id)=>{
      let section = document.getElementById(id);
      let cdetails = section.childNodes;
      
      
      let form = document.createElement('form');
      form.setAttribute("action","select_students.php");
      form.setAttribute("method","post");

      let cID = document.createElement('input');
      cID.setAttribute("type","text");
      cID.setAttribute("name","cid");
      cID.setAttribute("value",cdetails[1].innerHTML);
      
      let yr = document.createElement('input');
      yr.setAttribute("type","number");
      yr.setAttribute("name","year");
      yr.setAttribute("value",cdetails[2].innerHTML);

      let sem = document.createElement('input');
      sem.setAttribute("type","number");
      sem.setAttribute("name","sem");
      sem.setAttribute("value",cdetails[3].innerHTML);

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
