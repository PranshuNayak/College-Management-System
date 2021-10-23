<?php 
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $_SESSION['email']=$email;
        $t = 0;
        $s = 0;

    $connection = mysqli_connect("localhost","root","","dbms_project") or die("Can't connect to database to fetch info");
    $query_stu = "SELECT student_email,student_password,student_name,student_id FROM STUDENT";
    $result_stu = mysqli_query($connection,$query_stu) or die("Unable to fetch your query");
   


    while($row = mysqli_fetch_assoc($result_stu)){
        if($row['student_email']==$email && $row['student_password']==$password){
            $s=1;
            $_SESSION['name'] = $row['student_name'];
            $_SESSION['id']=$row['student_id'];
            $_SESSION['password']=$password;
            break;
        }
    }

    if($s==1){
        echo '<form action="./Student/home-page.php" method="POST"><button type="submit" id="btn"></button></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{ document.getElementById("btn").click()})</script>';   
}


    else{
        $query_t = "SELECT teacher_email,teacher_password,teacher_name,teacher_id FROM TEACHER";
        $result_t = mysqli_query($connection,$query_t) or die("Unable to fetch your query");
        while($row = mysqli_fetch_assoc($result_t)){
        if($row['teacher_email']==$email && $row['teacher_password']==$password){
        $t = 1;
        $_SESSION['name'] = $row['teacher_name'];
        $_SESSION['id']=$row['teacher_id'];
        break;
    }
}

if($t==1){
    echo '<form action="./Teacher/home-page.php" method="POST"><button type="submit" id="btn"></button></form>';
    echo '<script>document.addEventListener("DOMContentLoaded",()=>{ document.getElementById("btn").click()})</script>';   
}

else{ echo "<script>alert('Invalid User')</script>";
    include 'login.html';
}
}

   


    




    }

    



?>

