<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>assignment</title>
    <!-- normalize -->
    <!-- <link rel="stylesheet" href="./normalize.css" /> -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- main css -->
    <link rel="stylesheet" href="./assignment.css" />
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
        <?php
        require 'navbar.php';
        ?>
        <div class="title">
            <div id="heading">
                assignment
            </div>
            <div class="search_bar">
                <input type="text" name="search" id="search" placeholder="Date/Course_Id">
                <button type="button" class="search-btn">search</button>
            </div>
        </div>
    </header>

    <section class="questions">

        <!-- questions -->
        <!-- <div class="section-center"> -->
        <!-- single question -->
        <article class="question">
            <!-- question title -->
            <div class="question-title">
                <div class="date&course">
                    <p>September 9</p>
                    <p>CS2001-Data Sructure</p>
                </div>
                <p>Data Structure Enrollment Form</p>
                <button type="button" class="question-btn">
                    <span class="plus-icon">
                        <i class="far fa-plus-square"></i>
                    </span>
                    <span class="minus-icon">
                        <i class="far fa-minus-square"></i>
                    </span>
                </button>
            </div>
            <!-- question text -->
            <div class="question-text ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                    dolore illo dolores quia nemo doloribus quaerat, magni numquam
                    repellat reprehenderit.
                </p>
            </div>
        </article>
        <!-- end of single question -->
        <article class="question">
            <!-- question title -->
            <div class="question-title">
                <div class="date&course">
                    <p>September 9</p>
                    <p>CS2001-Data Sructure</p>
                </div>
                <p>Data Structure Enrollment Form</p>
                <button type="button" class="question-btn">
                    <span class="plus-icon">
                        <i class="far fa-plus-square"></i>
                    </span>
                    <span class="minus-icon">
                        <i class="far fa-minus-square"></i>
                    </span>
                </button>
            </div>
            <!-- question text -->
            <div class="question-text ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                    dolore illo dolores quia nemo doloribus quaerat, magni numquam
                    repellat reprehenderit.
                </p>
            </div>
        </article>
        <!-- end of single question -->
        <article class="question">
            <!-- question title -->
            <div class="question-title">
                <div class="date&course">
                    <p>September 9</p>
                    <p>CS2001-Data Sructure</p>
                </div>
                <p>Data Structure Enrollment Form</p>
                <button type="button" class="question-btn">
                    <span class="plus-icon">
                        <i class="far fa-plus-square"></i>
                    </span>
                    <span class="minus-icon">
                        <i class="far fa-minus-square"></i>
                    </span>
                </button>
            </div>
            <!-- question text -->
            <div class="question-text ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                    dolore illo dolores quia nemo doloribus quaerat, magni numquam
                    repellat reprehenderit.
                </p>
            </div>
        </article>
        <!-- end of single question -->
        <article class="question">
            <!-- question title -->
            <div class="question-title">
                <div class="date&course">
                    <p>September 9</p>
                    <p>CS2001-Data Sructure</p>
                </div>
                <p>Data Structure Enrollment Form</p>
                <button type="button" class="question-btn">
                    <span class="plus-icon">
                        <i class="far fa-plus-square"></i>
                    </span>
                    <span class="minus-icon">
                        <i class="far fa-minus-square"></i>
                    </span>
                </button>
            </div>
            <!-- question text -->
            <div class="question-text ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                    dolore illo dolores quia nemo doloribus quaerat, magni numquam
                    repellat reprehenderit.
                </p>
            </div>
        </article>
        <!-- end of single question -->
        <article class="question">
            <!-- question title -->
            <div class="question-title">
                <div class="date&course">
                    <p>September 9</p>
                    <p>CS2001-Data Sructure</p>
                </div>
                <p>Data Structure Enrollment Form</p>
                <button type="button" class="question-btn">
                    <span class="plus-icon">
                        <i class="far fa-plus-square"></i>
                    </span>
                    <span class="minus-icon">
                        <i class="far fa-minus-square"></i>
                    </span>
                </button>
            </div>
            <!-- question text -->
            <div class="question-text ">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                    dolore illo dolores quia nemo doloribus quaerat, magni numquam
                    repellat reprehenderit.
                </p>
            </div>
        </article>
        <!-- end of single question -->
        
        <!-- </div> -->
    </section>
    <script src="./assignment.js"></script>
</body>
<footer>
    <?php
        require './footer.php';
    ?>
</footer>
</html>