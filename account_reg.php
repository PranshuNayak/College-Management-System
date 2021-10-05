<?php 

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['id_no']) && isset($_POST['password']) ){
    
    $connection = mysqli_connect("localhost","root","","dbms_project");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id_no'];
    $password = $_POST['password'];
    
    if($_POST['type']==1){
        $query_check = "SELECT teacher_id FROM TEACHER";
        $res_check = mysqli_query($connection,$query_check) or die("Can not retrieve your query");
        $pass = 1;
        while($rows = mysqli_fetch_assoc($res_check)){
            if($rows['teacher_id']==$id){
                $pass = 0;
                break;
            }
        }
        if($pass==0){
            echo '<script>alert("User already exists with these credentials")</script>';
            include 'account_reg.html';
        }

        else{
            $query = "INSERT INTO TEACHER (teacher_name,teacher_email,teacher_password,teacher_id) VALUES ('$name','$email','$id','$password')";
            $res_ins = mysqli_query($connection,$query) or die("Can't add data");
            echo '<script>alert("Registered Succesfully")</script>';
            require 'login.html';
        }
    }

    else{
        $query_check = "SELECT student_id FROM STUDENT";
        $res_check = mysqli_query($connection,$query_check) or die("Can not retrieve your query");
        $pass = 1;
        while($rows = mysqli_fetch_assoc($res_check)){
            if($rows['student_id']==$id){
                $pass = 0;
                break;
            }
        }
        if($pass==0){
            echo '<script>alert("User already exists with these credentials")</script>';
            include 'account_reg.html';
        }

        else{
            $query = "INSERT INTO STUDENT (student_name,student_email,student_password,student_id) VALUES ('$name','$email','$id','$password')";
            $res_ins = mysqli_query($connection,$query) or die("Can't add data");
            echo '<script>alert("Registered Succesfully")</script>';
            require 'login.html';
        }   
    }
}

?>