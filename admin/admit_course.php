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
      .review{
        display:flex;
        flex-direction:column;
        min-height:80vh;
        width:50%;
        margin:0 auto;
      }



      .checkbox{
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

    <?php include 'navbar.php' ?>;
    <div class="review">

    <div class='d-flex'>
        <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success send">Approve Course</button>
    </div>
    


        <div class="row" style='display:grid;grid-template-columns:repeat(4,1fr);'>
        <div class="sno">S.No</div>
        <div class="course">Course</div>
        <div class="tid">Teacher Id</div>
        <div class='checkbox'>Approve</div>
        </div>

        <?php 
           
                $con = mysqli_connect("localhost","root","","dbms_project") or die(mysqli_error($con));
                $query = "SELECT * FROM REVIEW_COURSE WHERE approved=0";
                $res = mysqli_query($con,$query) or die(mysqli_error($con));
                $count=0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $count++;
                    $course = $row['course'];
                    $tid = $row['teacher_id'];
                    
                    echo "<div class='row courses' style='display:grid;grid-template-columns:repeat(4,1fr);' id='$count'>";
                    echo "<div class='sno'>$count</div>";
                    echo "<div class='name'>$course</div>";
                    echo "<div class='id'>$tid</div>";
                    echo "<div class='checkbox'><input class='option' type='checkbox'></div>";
                    echo "</div>";
                }
            
        ?>
        
    </div>

    
    <?php include '../footer.php' ?>;


    
  </body>
  <script>
      let search_bar = document.querySelector('.search');
      search_bar.addEventListener('keyup',()=>{
        console.log("Hello")
          let hint = search_bar.value.toUpperCase();
          
          let row_course = document.querySelectorAll('.courses');
          for (let i = 0; i < row_course.length; i++) {
              let cur_row = row_course[i].childNodes;
              
              let course = cur_row[1].innerHTML;
              let tid = cur_row[2].innerHTML;
              
              if(course.indexOf(hint)==-1 && tid.indexOf(hint)==-1){
                  row_course[i].style.display="none";
              }
              else{
                row_course[i].style.display="grid";
              }
          }
      });

      document.querySelector('.send').addEventListener('click',()=>{

          

          let checked_buttons = document.querySelectorAll('.option');
          
          let count = 0;
          let row="";
          for(let i=0;i<checked_buttons.length;i++){
              if(checked_buttons[i].checked){
                count++;
                  let parent = checked_buttons[i].parentNode.parentNode.childNodes;
                  if(row==""){
                    row = row + parent[1].innerHTML +"-"+parent[2].innerHTML;
                    }
                   else row =row + "*" + parent[1].innerHTML +"-"+parent[2].innerHTML;
                  
              }
              
          }


          if(count==0){
              alert('No Course selected for approval');
          }

          else{

            let form = document.createElement('form');
          form.setAttribute('action','register_t_course.php');
          form.setAttribute('method','POST');
          
          let crow = document.createElement('input');
          crow.setAttribute('name','row');
          crow.setAttribute('value',row);
          crow.setAttribute('type','text');



            let submit = document.createElement('input');
          submit.setAttribute('type','submit');
           
            
          form.append(crow);
          form.append(submit);
         
          form.style.display="none";
          document.body.append(form);
          submit.click();
          }
          
      })
  </script>
</html>