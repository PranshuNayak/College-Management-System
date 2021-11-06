<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Comtextble" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Make Announcement</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      height: 100vh;
      justify-content: space-between;
    }

    .content-area {
      display: grid;
      width: 95%;
      height: 70%;
      padding: 10px;
      grid-template-columns: repeat(8, 1fr);
      grid-template-rows: repeat(3, 1fr);
      grid-gap: 20px;
      margin: auto auto;
    }


    .image {
      grid-row: 1/-1;
      grid-column: 1/5;
    }

    .image>img {
      width: 100%;
      height: 100%;
    }

    .form {
      grid-row: 1/4;
      grid-column: 5/-1;
      display: flex;
      align-content: center;
      flex-direction: column;
      justify-content: space-evenly;
    }

    .form>div {
      width: 80%;
    }

    input {
      width: 100%;
    }

    h3 {
      text-align: center;
    }

    input {
      border: none;
      border-bottom: 0.5px solid black;
    }

    input[type="submit"] {
      background-color: #0275d8;
      color: white;
    }

    input:focus {
      outline: none;
    }

    #heading {
      /* border: 2px solid red; */
      font-size: 1.5rem;
      text-transform: capitalize;
      border: .5px solid;
      padding: 10px;
    }
    .hidden{
      visibility: hidden;
    }
  </style>
</head>

<body>



  <?php require 'navbar.php' ?>
  <div id="heading">
    add course 
  </div>
  <div class="content-area">
    <div class="image">
      <img src="../images/cover.jpg" alt="image">
    </div>
    <form action="insert_course.php" method="post" class="form">

      <div class="hidden">
        <h3>Add Course</h3>
      </div>
      <div><input type="text" name="cid" placeholder="Course_ID"></div>
      <div><input type="text" name="cname" placeholder="Course Name"></div>

      <div><input type="number" name="semester" placeholder="Semester"></div>
      <div><input type="number" name="year" placeholder="Year"></div>



      <div><input type="submit" value="Add Course" required></div>

    </form>
  </div>




  <?php require '../footer.php' ?>

</body>

</html>