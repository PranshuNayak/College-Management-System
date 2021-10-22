<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>announcement</title>
    <!-- normalize -->
    <!-- <link rel="stylesheet" href="./normalize.css" /> -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="./announcement.css" />
</head>

<body>

    <header>
        <!-- <nav>
            <div class="logo">
                <img src="./images/Iiitdmj-logo.jpg" alt="">
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="https://google.com " target="blank">home</a></li>
                <li><a href="#">account</a></li>
                <li><a href="#">courses</a></li>
                <li><a href="#">announcement</a></li>
                <li><a href="#">clubs</a></li>
            </ul>
        </nav> -->
        <?php session_start() ?>;
        <?php
            require 'navbar.php';
        ?>

        <div class="title" style="background-color:rgba(255, 255, 255, 0.253); border: 0.5px solid;">
            <div id="heading">
                annnouncement
            </div>
            <div class="search_bar">
                <input type="text" name="search" id="search" placeholder="Date/Course_Id" style="background-color: white; border: 0.5px solid black;">
                <button type="button" class="search-btn" style="background-color: white; border: 0.5px solid black;" >Search</button>
            </div>
        </div>
    </header>

    <section class="questions">
    <?php 
                $id = $_SESSION['id'];
                $con = mysqli_connect("localhost","root","","dbms_project") or die("Can't Connect to DB");
    ?>
        
    </section>
    <script src="./announcement.js"></script>
</body>
<footer>
    <?php
        require '../footer.php';
    ?>
</footer>

</html>