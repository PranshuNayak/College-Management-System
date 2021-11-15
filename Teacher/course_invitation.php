<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

   <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

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
      width: 60vw;
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
    .container{
      width: 730px;
      text-align: center;
      margin: auto !important;
    }
  </style>
</head>

<body>
  <?php session_start(); ?>
  <?php include 'navbar.php'; ?>
  <div id="heading">
    courses invitation
  </div>
  <section>
    <div class="content-area">
      <table>
        <tr class="head">
          <th class="sno-h">S.No</th>
          <th class="cid-h">Course Id</th>
          <th class="sem-h">Semester</th>
          <th class="year-h">Year</th>
          <th class="invite-h">Send Invite</th>
        </tr>

        <?php
        $id = $_SESSION['id'];
        $con = mysqli_connect("localhost", "root", "", "dbms_project");
        $query = "SELECT * FROM COURSE_TAUGHT WHERE teacher_id='$id'";
        $res = mysqli_query($con, $query) or die(mysqli_error($con));
        $count = 0;
        while ($row = mysqli_fetch_assoc($res)) {
          $count++;
          $course = $row['course'];
          $cdetails = explode("/", $course);
          $cid = $cdetails[0];
          $sem = $cdetails[1];
          $year = $cdetails[2];

          echo "<tr class='row-entry' id='$count'>";
          echo "<td class='sno'>$count</td>";
          echo "<td class='cid'>$cid</td>";
          echo "<td class='sem'>$sem</td>";
          echo "<td class='year'>$year</td>";
          // echo "<td><button class='question-btn sDetails' onclick='makeInvite($count)'>
          //               <span class='plus-icon'>
          //                   <i class='far fa-plus-square'></i>
          //               </span>
          //           </button></td>";
          echo "<td> <button class='btn btn-outline-success send' class='sDetails'  onclick='makeInvite($count)'>Send</button></td>";
          echo "</tr>";
        }
        if($count==0){
          echo "</table>";
          echo '<div class="container"><img src="../images/panda.jpg" width="700px" height="535px"></div>';
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
  let makeInvite = (id) => {
    let section = document.getElementById(id);
    let cdetails = section.childNodes;


    let form = document.createElement('form');
    form.setAttribute("action", "select_students.php");
    form.setAttribute("method", "post");

    let cID = document.createElement('input');
    cID.setAttribute("type", "text");
    cID.setAttribute("name", "cid");
    cID.setAttribute("value", cdetails[1].innerHTML);

    let yr = document.createElement('input');
    yr.setAttribute("type", "number");
    yr.setAttribute("name", "year");
    yr.setAttribute("value", cdetails[2].innerHTML);

    let sem = document.createElement('input');
    sem.setAttribute("type", "number");
    sem.setAttribute("name", "sem");
    sem.setAttribute("value", cdetails[3].innerHTML);

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