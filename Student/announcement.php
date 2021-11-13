<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>announcement</title>
    <!-- normalize -->
    <!-- <link rel="stylesheet" href="./normalize.css" /> -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <!-- main css -->
    <link rel="stylesheet" href="./announcement.css" />
    <style>
        .details{
            display:"none";
        }
        .hidden{
          display:"none";
      }
      .question-title{
          display:grid;
          grid-template-columns:60% 20% 10%;
      }
    </style>
</head>

<body>

    <header>
        <!-- <nav>
            <div class="logo">
                <img src="./images/Iiitdmj-logo.jpg" alt="">
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="https://google.com " target="blank">home</a></li>
                <li><a href="#">account</a></li>
                <li><a href="#">courses</a></li>
                <li><a href="#">announcement</a></li>
                <li><a href="#">clubs</a></li>
            </ul>
        </nav> -->
        <?php session_start() ?>
        <?php
            require 'navbar.php';
        ?>

        <div class="title" style="background-color:rgba(255, 255, 255, 0.253); border: 0.5px solid;">
            <div id="heading">
                annnouncement
            </div>
            <div class="search_bar">
                <input type="text" name="search" id="search" placeholder="Date/Course_Id" style="background-color: white; border: 0.5px solid black;">
                <button type="button" class="search-btn" style="background-color: white; border: 0.5px solid black;" >Search</button>
            </div>
        </div>
    </header>
    <section class="questions">
    <?php 
                $id = $_SESSION['id'];
                $con = mysqli_connect("localhost","root","","dbms_project") or die("Can't Connect to DB");
                $query = "SELECT * FROM ANNOUCEMENT WHERE course IN (SELECT course FROM COURSE_STUDENT WHERE student_id='$id')";
                $res = mysqli_query($con,$query);
                $count=0;
                while($row = mysqli_fetch_assoc($res)){
                    $count++;
                    $course = $row['course'];
                    $title = $row['TITLE'];
                    $description = $row['DESCRIPTION'];
                    $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
                    $res_cname = mysqli_query($con,$query_cname);
                    $row_cname = mysqli_fetch_assoc($res_cname);
                    $cname = $row_cname['course_name'];
                    $date = $row['annoucement_day'];
                    $time = $row['annoucement_time'];
                    $cdetails = explode("/",$course);
                    echo "<article class='question'>";
                    echo "<div class='question-title'>";
                    echo "<div class='date&course'>";
                    echo "<p>$date - $time </p>";
                    echo "<p>$cdetails[0] - $cname</p>";
                    echo "</div>";
                     echo "<p>$title</p>";
                    echo "<div class='scol2'><i class='fas fa-plus plus'></i><i class='fas fa-minus minus'></i></div>";
                    echo '<div class="question-text ">';
                    echo "<p>$description</p>";
                    echo '</div>';
                    echo "</div>";
                    echo "</article>";
                }

                $query1 = "SELECT * FROM COURSE_INVITE WHERE student_id='$id'";
                $res1 = mysqli_query($con,$query1);

                while($row = mysqli_fetch_assoc($res1)){
                    $count++;
                    $course = $row['course'];
                    $title = $row['TITLE'];
                    $description = $row['DESCRIPTION'];
                    $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
                    $res_cname = mysqli_query($con,$query_cname);
                    $row_cname = mysqli_fetch_assoc($res_cname);
                    $cname = $row_cname['course_name'];
                    $date = $row['annoucement_day'];
                    $time = $row['annoucement_time'];
                    $cdetails = explode("/",$course);
                    echo "<article class='question'>";
                    echo "<div class='question-title'>";
                    echo "<div class='date&course'>";
                    echo "<p>$date - $time </p>";
                    echo "<p>$cdetails[0] - $cname</p>";
                    echo "<p id='$count' style='display:none'>$course-$id</p>";
                    echo "<button class='invite-btn' onclick='sendInfo($count)'>Accept Invite</button>";
                    echo "</div>";
                  
                     echo "<p>$title</p>";
                     echo '<div class="scol2"><i class="fas fa-plus plus"></i><i class="fas fa-minus minus"></i></div>';
                     echo '<div class="question-text ">';
                    echo "<p>$description</p>";
                    echo '</div>';
                    echo "</div>";
                    
                    echo "</article>";
                }

                if($count==0){
                    echo '<div class="container text-center"><img src="../images/panda.jpg" width="700px" height="535px"></div>';
                  }

    ?>
        
    </section>
 
    <script>
        let sendInfo = (id)=>{
           let detail = document.getElementById(id).innerHTML;
           let sep = detail.split("-");
           let cdetails = sep[0].split("/");
           let cid = cdetails[0];
           let sem = cdetails[1];
           let year = cdetails[2];
           let sid = sep[1];

           let form = document.createElement('form');
          form.setAttribute('action','register_course.php');
          form.setAttribute('method','POST');
          
          let Cid = document.createElement('input');
          Cid.setAttribute('type','text');
          Cid.setAttribute('value',cid);
          Cid.setAttribute('name','cid');

          let Sem = document.createElement('input');
          Sem.setAttribute('type','text');
          Sem.setAttribute('value',sem);
          Sem.setAttribute('name','sem');

          let Year = document.createElement('input');
          Year.setAttribute('type','text');
          Year.setAttribute('value',year);
          Year.setAttribute('name','year');

          let Sid = document.createElement('input');
          Sid.setAttribute('type','text');
          Sid.setAttribute('value',sid);
          Sid.setAttribute('name','sid');



          
          let submit = document.createElement('input');
          submit.setAttribute('type','submit');
          
            
          form.append(Cid);
          form.append(Sem);
          form.append(Year);
          form.append(Sid);
          form.append(submit);
         
          form.style.display="none";
          document.body.append(form);
          submit.click();
        }
    </script>
    <script>
    let minus = document.querySelectorAll('.minus');
    minus.forEach(icon => {
        icon.style.display="none";
    });
    let plus = document.querySelectorAll('.plus');
    plus.forEach(icon => {
        icon.addEventListener('click',()=>{
            let hiddenDiv = icon.parentElement.parentElement.children[3]
            hiddenDiv.style.display="block"
          
            let buttons = icon.parentElement.children
            buttons[0].style.display="none";
            buttons[1].style.display="block";
        })
    });

    
    minus.forEach(icon => {
        icon.addEventListener('click',()=>{
            let hiddenDiv = icon.parentElement.parentElement.children[3]
            hiddenDiv.style.display="none"
            
            let buttons = icon.parentElement.children
            buttons[0].style.display="block";
            buttons[1].style.display="none";
        })
    });
  </script>
       <script src="./announcement.js"></script>
</body>
<footer>
    <?php
        require '../footer.php';
    ?>
</footer>

</html>