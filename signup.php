<?php
include 'partials/dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $sql="SELECT * FROM `users` WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "Email already exists.";
    }else{
        if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_email`, `password`, `timestamp`) VALUES ('$email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo '<script>alert("Signup Successfull.");';
            }
        }else{
            echo '<script>alert("Passwords did not match.");';
        }    
    }
    // header('Location: /coddiscuss/index.php');    
}
?>