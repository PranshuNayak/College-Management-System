<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>
    <style>
      .student-details{
        display:flex;
        flex-direction:column;
        min-height:80vh;
        width:50%;
        margin:0 auto;
      }

      .other-emails{
        display:flex;
        flex-direction:column;
        width:50%;
        margin:0 auto;
      }

      .details{
        display:grid;
        grid-template-columns:repeat(5,1fr);
        margin:10px 0px;
      }

      .check{
          display:flex;
          justify-content:center;
          align-items:center;
      }
    </style>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <?php session_start() ?>;
    <?php include 'navbar.php' ?>;
    <div class="student-details">

    <div class="d-flex">
        <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success send">Send Invite</button>
    </div>
    


        <div class="details">
        <div class="sno">S.No</div>
        <div class="name">Name</div>
        <div class="id">Roll No.</div>
        <div class="email">Email</div>
        <div>Select Student</div>
        </div>

        <?php 
            if(isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['sem'])){
                $cid = $_POST['cid'];
                $sem = $_POST['year'];
                $year = $_POST['sem'];
                echo "<div class='cdetails' style='display:none'>";
                echo "<div>$cid</div>";
                echo "<div>$sem</div>";
                echo "<div>$year</div>";
                echo "</div>";
                $id = $_SESSION['id'];
                $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
                $query = "SELECT * FROM STUDENT";
                $res = mysqli_query($con,$query) or die(mysqli_error($con));
                $count=0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $count++;
                    $name = $row['student_name'];
                    $roll_no = $row['student_id'];
                    $email = $row['student_email'];
                    echo "<div class='details rdetails' id='$count'>";
                    echo "<div class='sno'>$count</div>";
                    echo "<div class='name'>$name</div>";
                    echo "<div class='id'>$roll_no</div>";
                    echo "<div class='email'>$email</div>";
                    echo "<div class='check'><input class='option' type='checkbox'></div>";
                    echo "</div>";
                }
            }
        ?>
        
    </div>

    
    <?php include '../footer.php' ?>;


    
  </body>
  <script>
      let search_bar = document.querySelector('.search');
      search_bar.addEventListener('keyup',()=>{
          let hint = search_bar.value;
          let students = document.querySelectorAll('.rdetails');
          for (let i = 0; i < students.length; i++) {
              let student = students[i].childNodes;
              
              let email = student[3].innerHTML;
              if(email.indexOf(hint)==-1){
                  students[i].style.display="none";
              }
              else{
                students[i].style.display="grid";
              }
          }
      });

      document.querySelector('.send').addEventListener('click',()=>{
          let details = document.querySelector('.cdetails').childNodes;
         
          let cid = "";
          cid = cid + details[0].innerHTML + "/";
          cid = cid + details[1].innerHTML + "/";
          cid = cid + details[2].innerHTML;
          console.log(cid);
          let form = document.createElement('form');
          form.setAttribute('action','register_students.php');
          form.setAttribute('method','POST');
          
          let course = document.createElement('input');
          course.setAttribute('name','course');
          course.setAttribute('value',cid);
          course.setAttribute('type','text');

         
          let student = document.createElement('input');
                  student.setAttribute('name','sids');
                  student.setAttribute('type','text');
          

          let checked_buttons = document.querySelectorAll('.option');
          
          let count = 0;
          let sid="";
          for(let i=0;i<checked_buttons.length;i++){
              if(checked_buttons[i].checked){
                count++;
                  let parent = checked_buttons[i].parentNode.parentNode.childNodes;
                  if(sid==""){
                    sid = sid + parent[2].innerHTML;
                    }
                   else sid = sid + "/" + parent[2].innerHTML;
                  
              }
              
          }

          
          if(count==0){
              alert('No Student Selected');
          }

          else{
            let submit = document.createElement('input');
          submit.setAttribute('type','submit');
            student.setAttribute('value',sid);
            
          form.append(course);
          form.append(submit);
          form.append(student);
          form.style.display="none";
          document.body.append(form);
          submit.click();
          }
      })
  </script>
</html>