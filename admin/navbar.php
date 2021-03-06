
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="account.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <title>Navbar</title>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"><li class="navbar-left">
                <a><img src="../images/iiitdmj-icon.jpg" alt="IITDMJ LOGO" width="50" height="40"></a>
            </li></ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0" id="navigation">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="home-page.php">Home</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link " href="account.php">Account</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;
                
                  <li class="nav-item">
                    <a class="nav-link" href="admit_course.php">Course Requests</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;

                <li class="nav-item">
                    <a class="nav-link" href="add_course.php">Add Course</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;
                
            </ul>
        </div>
    </nav>
</body>
<!-- 2. GOOGLE JQUERY JS v3.2.1  JS !-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- 3. BOOTSTRAP v4.0.0         JS !-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
   let a_tags = document.querySelectorAll('a');
   let loc = window.location.href;
   for (let i = 0; i < a_tags.length; i++) {
       let href = a_tags[i].getAttribute('href');
        if(loc.indexOf(href)!=-1){
            a_tags[i].style.backgroundColor="#4CA8BD";
            
            a_tags[i].style.color="white";
            a_tags[i].style.borderRadius="6px";
           
        }

        else{
            a_tags[i].style.color="black";
        }
       
   }
</script>
</html>