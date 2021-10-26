<?php 
session_start();
if($_POST['cur_pas'] && $_POST['new_pas1'] && $_POST['new_pas2']){
    $cur_pas = $_POST['cur_pas'];
    $new_pas1 = $_POST['new_pas1'];
    $new_pas2 = $_POST['new_pas2'];
    $email = $_SESSION['email'];
    if($new_pas1!=$new_pas2){
        echo "<script>alert('Enter Same Password in the update field')</script>";
        echo "<script>window.location.href='account.php'</script>";
        die();
    }

    else{
        $con = mysqli_connect("localhost","root","","dbms_project");
        $query = "UPDATE ADMIN SET admin_password='$new_pas1' WHERE admin_email='$email'";
        $res = mysqli_query($con,$query);
        if($res==0){
            $err = mysqli_error($con);
            echo "<script>alert($err)</script>";
            echo "<script>window.location.href='account.php'</script>";
        }
        echo "<script>alert('Password updated Successfully')</script>";
        echo "<script>window.location.href='account.php'</script>";
    }
}

?>