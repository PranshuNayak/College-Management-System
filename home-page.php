<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
        
        .content-area{
            display: grid;
            grid-template-rows:repeat(3,1fr);
            grid-template-columns: repeat(3,1fr);
            height:85vh;
            width:80vw;
            margin:0 auto;
        }
        
        .cover-image{
            grid-row: 1/3;
            grid-column: 2/-1;
        }

        .cover-image > img{
            width: 100%;
            height: 100%;
        }


        .welcome{
            grid-row: 2/3;
            grid-column: 1/2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        

    </style>

</head>
<body>

        <?php 
            require 'navbar.php';
        ?>

        <div class="content-area">
            <div class="cover-image">
                <img src="images/cover.jpg" alt="">
            </div>
            <div class="welcome">
                <div>
                    <h1>Welcome Alex!
                        <br>Here's some quick tips to get you started!
                    </h1>
                    <ul>
                        <li>Click on the Courses Tab to access all your courses</li>
                        <li>Complete Your remaining tasks by visiting the To-Do Section</li>
                        <li>View Your Account Information in the Account Section</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php 
            require 'footer.php';
        ?>
</body>
</html>
