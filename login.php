<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <form action="backend.php" method="POST">
        <div class="container">
            <div class="tittle">
                <div class="logo">
                    <img src="images/iiitdmj-icon.jpg" alt="logo">
         
                    <!-- <h3>Canvas</h3> -->
                </div>
                <div>
                    <li class="decoration"><a href="">Dont't have a account?</a></li>
                    <li class="decoration"><a href="account-registration.php"> Sign up</a></li>
                </div>

            </div>
            <div class="credencial">
                <div id="Email">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" placeholder="xyx@abc.com" required>
                </div>
                <div id="Password">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" placeholder="************" required>
                </div>
            </div>
            <div class="log_in">
                <div>
                    <input type="checkbox" name="status" id="stay">
                    <label for="stay">stay signed in</label>
                    <!-- <li class="decoration"><a href="#home">Forgot Password?</a></li> -->
                    <li class="decoration">Welcome to the team</li>
                </div>
                <button type="submit" value="Log in" id="btn">Log in</button>
            </div>

        </div>
    </form>
</body>

</html>