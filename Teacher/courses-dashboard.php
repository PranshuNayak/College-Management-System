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
        height: 70vh;
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
        height: 100%;
        display: flex;
        border: 2px solid rgba(59, 54, 54, 0.068);
        flex-direction: column;
        justify-content: space-between;
      }

      .desc{
          display:flex;
          width: 100%;
          justify-content: space-evenly;
          border-bottom:0.5px solid #f4f4f4;
      }

      h3{
        text-align:center;
      }

      .head{
        background-color:black;
        color:white;
      }
    </style>
  </head>
  <body>
    <?php   require 'navbar.php' ?>
    <div><h3>Courses You teach</h3></div>
    <div class="content-area">
      <div class="image">
        <img src="../images/cover.jpg" alt="image" />
      </div>

      <div class="course-desc">

        <div class="desc head">
            <div class="snum">#</div>
            <div class="cname">Course Name.</div>
            <div class="cid">Course ID</div>
            <div class="year">Year</div>
            <div class="semester">Semester</div>
          </div>

        <div class="desc">
            <div class="snum">1</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
          
        </div>

        <div class="desc">
            <div class="snum">2</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>

        <div class="desc">
            <div class="snum">2</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>

        <div class="desc">
            <div class="snum">3</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>

        <div class="desc">
            <div class="snum">4</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>

        <div class="desc">
            <div class="snum">5</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>

        <div class="desc">
            <div class="snum">6</div>
          <div class="cname">DBMS</div>
          <div class="cid">CS2004</div>
          <div class="year">2021</div>
          <div class="semester">3</div>
        </div>
      </div>
    </div>

    <?php require '../footer.php' ?>
    
  </body>
</html>
