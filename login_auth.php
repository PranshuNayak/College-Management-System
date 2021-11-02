<?php 
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $_SESSION['email']=$email;
        $t = 0;
        $s = 0;

    $connection = mysqli_connect("localhost","root","","dbms_project") or die("Can't connect to database to fetch info");

    $query_admin = "SELECT * FROM ADMIN";
    $res_admin = mysqli_query($connection,$query_admin) or die(mysqli_error());
    while($row=mysqli_fetch_assoc($res_admin)){
      
        if($row['admin_password']==$password && $row['admin_email']==$email){
            echo "<script>window.location.href='admin/home-page.php'</script>";
            die();
        }
    }
        
    
    $query_stu = "SELECT student_email,student_password,student_name,student_id,student_github,student_linkedin,student_bio FROM STUDENT";
    $result_stu = mysqli_query($connection,$query_stu) or die("Unable to fetch your query");
   


    while($row = mysqli_fetch_assoc($result_stu)){
        if($row['student_email']==$email && $row['student_password']==$password){
            $s=1;
            $_SESSION['name'] = $row['student_name'];
            $_SESSION['id']=$row['student_id'];
            $_SESSION['github']=$row['student_github'];
            $_SESSION['linkedin']=$row['student_linkedin'];
            $_SESSION['bio']=$row['student_bio'];
            $_SESSION['password']=$password;
            break;
        }
    }

    if($s==1){
        echo "<script>window.location.href='./Student/home-page.php'</script>";
}


    else{
        $query_t = "SELECT teacher_email,teacher_password,teacher_name,teacher_id,teacher_github,teacher_linkedin,teacher_bio FROM TEACHER";
        $result_t = mysqli_query($connection,$query_t) or die("Unable to fetch your query");
        while($row = mysqli_fetch_assoc($result_t)){
        if($row['teacher_email']==$email && $row['teacher_password']==$password){
        $t = 1;
        $_SESSION['name'] = $row['teacher_name'];
        $_SESSION['id']=$row['teacher_id'];
        $_SESSION['github']=$row['teacher_github'];
        $_SESSION['linkedin']=$row['teacher_linkedin'];
        $_SESSION['bio']=$row['teacher_bio'];
        break;
    }
}

if($t==1){
    echo "<script>window.location.href='./Teacher/home-page.php'</script>";
}

else{ echo "<script>alert('Invalid User')</script>";
    echo "<script>window.location.href='login.html'</script>";
}
}

   


    




    }

    



?>

