<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>assignment</title>
    <!-- normalize -->
    <!-- <link rel="stylesheet" href="./normalize.css" /> -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="./assignment.css" />
    <style>
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
        <?php session_start(); ?>
        <?php
        require 'navbar.php';
        ?>
        <div class="title"  style="background-color:rgba(255, 255, 255, 0.253); border: 0.5px solid;">
            <div id="heading">
                assignment
            </div>
            <div class="search_bar">
                <input type="text" name="search" id="search" class="sinput" placeholder="Date/Course_Id" style="background-color: white; border: 0.5px solid black;">
                
            </div>
        </div>
    </header>

    <section class="questions">

    <?php 
                $id = $_SESSION['id'];
                $con = mysqli_connect("localhost","root","","dbms_project") or die("Can't Connect to DB");
                $query = "SELECT * FROM ASSIGNMENT WHERE course IN (SELECT course FROM COURSE_STUDENT WHERE student_id='$id')";
                $res = mysqli_query($con,$query);
                $count=0;
                while($row = mysqli_fetch_assoc($res)){
                    $count++;
                    $course = $row['course'];
                    $title = $row['TITLE'];
                    $link = $row['assignment_link'];
                    $description = $row['DESCRIPTION'];
                    $query_cname = "SELECT course_name FROM COURSES WHERE course='$course'";
                    $res_cname = mysqli_query($con,$query_cname);
                    $row_cname = mysqli_fetch_assoc($res_cname);
                    $cname = $row_cname['course_name'];
                    $date = $row['assignment_day'];
                    $time = $row['assignment_time'];
                    $link = $row['assignment_link'];
                    $cdetails = explode("/",$course);
                    echo "<article class='question'>";
                    echo "<div class='question-title'>";
                    echo "<div class='date&course dc'>";
                    echo "<p>$date - $time </p>";
                    echo "<p>$cdetails[0] - $cname</p>";
                    echo "</div>";
                     echo "<p>$title</p>";
                    echo "<div class='question-btn'><i class='fas fa-plus plus'></i><i class='fas fa-minus minus'></i></div>";
                    echo '<div class="question-text ">';
                    echo "<p>$description<p><a href='$link'>Assignment Link</a></p></p>";
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

    document.querySelector('.sinput').addEventListener('keyup',()=>{
        let key = document.querySelector('.sinput').value.toUpperCase();
        
        if(key){
            let contents = document.querySelectorAll('.dc')
        contents.forEach(content => {
            let element = content.children
            let parent = content.parentElement.parentElement
            let date = element[0].innerHTML.split("-")[1]
            let cid = element[1].innerHTML.split("-")[0]
            if( !(date.includes(key) || cid.includes(key) ) ){
                parent.style.display="none";
            }
        });
        }
        else{
            let articles = document.querySelectorAll('.question')
        articles.forEach(article => {
            article.style.display="block";
        });
        }
    })
  </script>
</body>
<footer>
    <?php
        require '../footer.php';
    ?>
</footer>
</html>