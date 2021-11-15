[18:19, 11/15/2021] Piyush Bhandari: <!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title></title>
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
      text-align: center;
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
      width: 58vw;
      margin-top: 75px;
      margin: auto;
    }

    th,
    td {
      padding: 15px;
    }

    section {
      padding: 10px;
      /* border: 2px solid red; */
      /* position: relative; */
      min-height: 453px !important;
      margin-top: 10px;
    }

    .head {
      background-color: black;
      color: white;
    }

    .container {
      width: 730px;
      text-align: center;
      margin: auto !important;
    }

    .search-bar {
      width: 50%;
      margin: 0 auto;
      margin-bottom: 7px;
    }

    .review {
      display: flex;
      flex-direction: column;
      min-height: 80vh;
      width: 50%;
      margin: 0 auto;
    }

    .checkbox {
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 400;
    }

    .label-checkbox {
      border: 0.1px solid black;
      padding: 2px 12px;
      margin: 0 11px 0 0;
      border-radius: 8px;
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

  <?php session_start(); ?>
  <?php include 'navbar.php'; ?>
  <div id="heading">
    invite students
  </div>
  <!-- <div class="student-details"> -->
  <section>
    <div class="content-area">

      <div class="search-bar">
        <div class="d-flex">
          <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success send">Send Invite</button>
        </div>
      </div>

      <table>
        <tr class="head">
          <th class="sno-h">S.No</th>
          <th class="name-h">Student Name</th>
          <th class="id-h">Student id</th>
          <th class="email-h">Email</th>
          <th class="checkbox-h">Approve Students</th>
        </tr>

        <?php
        if (isset($_POST['cid']) && isset($_POST['year']) && isset($_POST['sem'])) {
          $cid = $_POST['cid'];
          $sem = $_POST['year'];
          $year = $_POST['sem'];
          echo "<div class='cdetails' style='display:none'>";
          echo "<div>$cid</div>";
          echo "<div>$sem</div>";
          echo "<div>$year</div>";
          echo "</div>";
          $id = $_SESSION['id'];
          $con = mysqli_connect("localhost", "root", "", "dbms_project") or die(mysqli_error($con));
          $query = "SELECT * FROM STUDENT";
          $res = mysqli_query($con, $query) or die(mysqli_error($con));
          $count = 0;
          while ($row = mysqli_fetch_assoc($res)) {
            $count++;
            $name = $row['student_name'];
            $roll_no = $row['student_id'];
            $email = $row['student_email'];

            echo "<tr class='row-entry rdetails' id='$count'>";
            echo "<td class='sno'>$count</td>";
            echo "<td class='name'>$name</td>";
            echo "<td class='id'>$roll_no</td>";
            echo "<td class='email'>$email</td>";
            echo "<td class='checkbox'>
                    <label for='select-$count' class='label-checkbox'>Select</label>
                    <input class='option' type='checkbox' id='select-$count'>
                  </td>";
            echo "</tr>";
          }
          if ($count == 0) {
            echo "</table>";
            echo '<div class="container"><img src="../images/panda.jpg" width="700px" height="535px"></div>';
          }
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
  let search_bar = document.querySelector('.search');
  search_bar.addEventListener('keyup', () => {
    let hint = search_bar.value.toUpperCase();
    let students = document.querySelectorAll('.rdetails');
    for (let i = 0; i < students.length; i++) {
      let student = students[i].childNodes;

      let name = student[1].innerHTML.toUpperCase();
      let rollno = student[2].innerHTML.toUpperCase();
      if (name.indexOf(hint) == -1 && rollno.indexOf(hint)) {
        students[i].style.display = "none";
      } else {
        students[i].style.display = "grid";
      }
    }
  });

  document.querySelector('.send').addEventListener('click', () => {
    let details = document.querySelector('.cdetails').childNodes;

    let cid = "";
    cid = cid + details[0].innerHTML + "/";
    cid = cid + details[1].innerHTML + "/";
    cid = cid + details[2].innerHTML;
    console.log(cid);
    let form = document.createElement('form');
    form.setAttribute('action', 'register_students.php');
    form.setAttribute('method', 'POST');

    let course = document.createElement('input');
    course.setAttribute('name', 'course');
    course.setAttribute('value', cid);
    course.setAttribute('type', 'text');


    let student = document.createElement('input');
    student.setAttribute('name', 'sids');
    student.setAttribute('type', 'text');


    let checked_buttons = document.querySelectorAll('.option');

    let count = 0;
    let sid = "";
    for (let i = 0; i < checked_buttons.length; i++) {
      if (checked_buttons[i].checked) {
        count++;
        let parent = checked_buttons[i].parentNode.parentNode.childNodes;
        if (sid == "") {
          sid = sid + parent[2].innerHTML;
        } else sid = sid + "/" + parent[2].innerHTML;

      }

    }


    if (count == 0) {
      alert('No Student Selected');
    } else {
      let submit = document.createElement('input');
      submit.setAttribute('type', 'submit');
      student.setAttribute('value', sid);

      form.append(course);
      form.append(submit);
      form.append(student);
      form.style.display = "none";
      document.body.append(form);
      submit.click();
    }
  })
</script>

</html>