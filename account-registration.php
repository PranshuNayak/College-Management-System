<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sign up.css">

</head>

<body>
    <form action="backend.php" method="POST">
        <div class="container">
            <div class="tittle">
                <div class="logo">
                    <img src="images/iiitdmj-icon.jpg" alt="logo">

                </div>

            </div>
            <div class="formatting" id="user">
                User Registration
            </div>
            	<div class="credential">
                <div id="Name">
                    <label for="">Name</label><br>
                    <input style="width:188px" type="text" name="fname" class="name" placeholder="First name" required>
                    <input style="width:187px" type="text" name="lname" class="name" placeholder="Last name" required>
                </div>
                <div id="Email">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" placeholder="xyz@example.com" required>
                </div>
                <div id="Profession">
                    <label for="account-type">Profession</label><br>
                    <select name="type" id="account-type">
                        <option value="0">*Select Account Type</option>
                        <option value="1">Teacher</option>
                        <option value="2">Student</option>
                    </select>
                </div>
                <div id="Email">
                    <label for="r_no">Institution Id</label><br>
                    <input type="text" name="rollno" id="r_no" placeholder="Roll Number/PF Number" required>
                </div>
                <div id="Password">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="**********" required>
                </div>
            </div>
            <div class="log_in">
                <div>
                    <input type="checkbox" name="status" id="stay">
                    <label for="stay">Stay signed in</label>
                    <!-- <li class="decoration"><a href="#home">Forgot Password?</a></li> -->
                    <li class="decoration">Welcome to the team</li>
                </div>
                <button type="submit" value="Log in" id="btn">Register</button>

            </div>
        </div>
    </form>
</body>

</html> 