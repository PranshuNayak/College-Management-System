<?php 
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $t = 0;
        $s = 0;

    $connection = mysqli_connect("localhost","root","","dbms_project") or die("Can't connect to database to fetch info");
    $query_stu = "SELECT student_email,student_password,student_name FROM STUDENT";
    $result_stu = mysqli_query($connection,$query_stu) or die("Unable to fetch your query");
   


    while($row = mysqli_fetch_assoc($result_stu)){
        if($row['student_email']==$email && $row['student_password']==$password){
            $s=1;
            $_SESSION['name'] = $row['student_name'];
            break;
        }
    }

    if($s==1){
        echo '<form action="home-page.php" method="POST"><button type="submit" id="btn"></button></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{ document.getElementById("btn").click()})</script>';   
}


    else{
        $query_t = "SELECT teacher_email,teacher_password,teacher_name FROM TEACHER";
        $result_t = mysqli_query($connection,$query_t) or die("Unable to fetch your query");
        while($row = mysqli_fetch_assoc($result_t)){
        if($row['teacher_email']==$email && $row['teacher_password']==$password){
        $t = 1;
        $_SESSION['name'] = $row['student_name'];
        break;
    }
}

if($t==1){
    echo '<form action="home-page-te.php" method="POST"><button type="submit" id="btn"></button></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{ document.getElementById("btn").click()})</script>';   
}

else echo "<script>alert('Invalid User')</script>";
}

   


    




    }

    



?>

