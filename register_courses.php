<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <img src="images/cover.jpg" alt="image">
        </div>
       <div class="form">
         <div><h3>Register Here!</h3></div>
         <div><input type="text" name="Name" placeholder="Name" required></div>
         <div><input type="text" name="Registration Number" placeholder="Registration Number" required></div>
         <div><input type="text" name="Course Name" placeholder="Course Name" required></div>
         <div><input type="text" name="Course ID" placeholder="Course ID" required></div>
         <div><input type="submit" value="Register" required></div>
       </div>
      </div>
           

    <?php require 'footer.php' ?>
</body>
</html>