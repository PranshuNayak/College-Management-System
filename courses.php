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
          grid-template-rows: repeat(2,1fr);
          grid-gap:20px;
          margin:auto auto;
        }

       
       .image{
           grid-row: 1/3;
           grid-column:1/5;
       }
       .image > img{
           width: 100%;
           height: 100%;
       }

       .course-desc{
           display: grid;
           border: 2px solid rgba(59, 54, 54, 0.068);
           grid-template-rows: repeat(2,1fr);
            border-radius: 10px;
            
       }

       .grade{
        background-color: rgb(151, 241, 151);
        display:flex;
        justify-content: space-evenly;
        align-items: center;
        border-radius: 5px;
        padding: 3px;
       }

       .dot{
           display: flex;
           justify-content: center;
           align-items: center;
       }

       .dot > img{
           width: 60%;
           height: 100%;
           
       }

       .per{
           background-color: white;
           padding: 7px;
           border-radius: 20%;
       }

       .desc{
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
       }
       
    </style>
</head>
<body>
   
    <?php   require 'navbar.php' ?>
    <div class="content-area">
        <div class="image">
            <img src="images/cover.jpg" alt="image">
        </div>
       <div class="course-desc">
           <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
       <div class="course-desc">
       <div class="grade">
               <div class="per">99.6%</div>
               <div class="dot">
                   <img src="images/more.png" alt="">
               </div>
           </div>
           <div class="desc">
               <div class="cname">DBMS</div>
               <div class="cid">CS2004</div>
           </div>
       </div>
    </div>

    <?php require 'footer.php' ?>
</body>
</html>