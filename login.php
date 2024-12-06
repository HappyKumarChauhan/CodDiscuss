<?php
include 'partials/dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `users` WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){
        echo "Your email is not registered with us.";
    }else{
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION['loggedIn']=true;
            $_SESSION['username']=$email;
            $_SESSION['sno']=$row['sno'];
        }else{
            echo "Incorrect password";
        }
    }
    header('Location: /coddiscuss/index.php');
}
?>