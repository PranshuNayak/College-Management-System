<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comtextble" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Announcement</title>
    <style>

        body{
            display:flex;
            flex-direction:column;
            height:100vh;
            justify-content:space-between;
        }
       .content-area{
           display:grid;
           width: 95%;
           height: 70%;
          padding: 10px;
          grid-template-columns: repeat(8,1fr);
          grid-template-rows: repeat(3,1fr);
          grid-gap:20px;
          margin:auto auto;
        }

       
       .image{
           grid-row: 1/-1;
           grid-column:1/5;
       }
       .image > img{
           width: 100%;
           height: 100%;
       }

       .form{
         grid-row: 2/4;
         grid-column: 5/-1;
         display: flex;
         align-content: center;
         flex-direction: column;
         justify-content: space-evenly;
       }

       .form > div{
         width: 80%;
       }

       input{
         width: 100%;
       }

       h3{
         text-align: center;
       }
       
       input{
         border: none;
         border-bottom: 0.5px solid black;
       }

       input[type="submit"]{
         background-color:#0275d8;
         color:white;
       }
       
       input:focus{
         outline: none;
       }

    </style>
</head>
<body>

      
   
    <?php   require 'navbar.php' ?>
    <div class="content-area">
        <div class="image">
            <img src="../images/cover.jpg" alt="image">
        </div>
       <form action="insert_annoucement.php" method="post" class="form">
         
         <div><h3>Issue Annoucement</h3></div>
         <div><input type="text" name="cid" placeholder="Course_Id" required></div>
        
         <div><input type="number" name="semester" placeholder="Semester" required></div>
         <div><input type="number" name="year" placeholder="Year" required></div>
         <div><textarea name="title" cols="61" rows="1" placeholder="Title"></textarea></div>
         <div><textarea name="desc" cols="61" rows="3" placeholder="Content"></textarea></div>
         <div><input type="text" name="material_link" placeholder="Annoucement Link" required></div>
         <div><input type="submit" value="Submit" required></div>
         
      </form>
      </div>
       

    <?php require '../footer.php' ?>
  
</body>
</html>