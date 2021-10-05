<!-- <?php
      // $insert = false;
      // //connection to the database
      // $servername = "localhost";
      // $username = "root";
      // $password = "";
      // $database = "College";

      // $conn = mysqli_connect($servername, $username, $password, $database);
      // if (!$conn) {
      //     die("Sorry! connection is failed: " . mysqli_connect_error());
      // }
      ?> -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="account.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">     -->
    <title>Account</title>
</head>

<body>
<?php   require 'navbar.php' ?>
    <div class="container mb-2" >
    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3">
          Account settings
        </h4>
    
        <div class="card overflow-hidden">
          <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
              <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                <a class="list-group-item list-group-item-action" href="login.php">Logout</a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="account-general">
    
                  <div class="card-body media align-items-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                    <div class="media-body ml-4">
                      <label class="btn btn-outline-primary">
                        Upload new photo
                        <input type="file" class="account-settings-fileinput">
                      </label> &nbsp;
                      <button type="button" class="btn btn-default md-btn-flat">Reset</button>
    
                      <div class="text-dark small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                  </div>
                  <hr class="border-light m-0">
    
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control mb-1" value="" >
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input type="email" class="form-control mb-1" value="" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Institution</label>
                      <input type="text" disabled class="form-control" value="IIITDMJ">
                    </div>
                  </div>
    
                </div>
                <div class="tab-pane fade" id="account-change-password">
                  <div class="card-body pb-2">
    
                    <div class="form-group">
                      <label class="form-label">Current password</label>
                      <input type="password" class="form-control">
                    </div>
    
                    <div class="form-group">
                      <label class="form-label">New password</label>
                      <input type="password" class="form-control">
                    </div>
    
                    <div class="form-group">
                      <label class="form-label">Repeat new password</label>
                      <input type="password" class="form-control">
                    </div>
    
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info">
                  <div class="card-body pb-2">
    
                    <div class="form-group">
                      <label class="form-label">Bio</label>
                      <textarea class="form-control" rows="5">ABCD</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <input type="text" disabled class="form-control" value="India">
                    </div>
    
    
                  </div>
          
                </div>
                <div class="tab-pane fade" id="account-social-links">
                  <div class="card-body pb-2">
    
                    <div class="form-group">
                      <label class="form-label">Twitter</label>
                      <input type="text" class="form-control" value="https://twitter.com/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Facebook</label>
                      <input type="text" class="form-control" value="https://www.facebook.com/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Github</label>
                      <input type="text" class="form-control" value="https://github.com/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">LinkedIn</label>
                      <input type="text" class="form-control" value="https://www.linkedin.com/in/user">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Instagram</label>
                      <input type="text" class="form-control" value="https://www.instagram.com/user">
                    </div>
    
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <div class="text-right mt-3">
          <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
          <button type="button" class="btn btn-default">Cancel</button>
        </div>
    
      </div>
    </div>
    <?php require 'footer.php' ?>

</body>

<!-- 2. GOOGLE JQUERY JS v3.2.1  JS !-->
<!-- 3. BOOTSTRAP v4.0.0         JS !-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->
    
</html>