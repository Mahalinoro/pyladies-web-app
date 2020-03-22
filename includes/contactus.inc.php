<?php

if(isset($_POST['contact-submit'])){

    require "dbh.inc.php";

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(empty($fullname) || empty($email) || empty($message)){
        header("Location: ../index.php?error=emptyfields&lastname=".$fullname."&email=".$email."&message=".$message);
        exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.php?error=invalidmail&lastname=".$fullname."&message=".$message);
        exit();
    }
    else{
        $sql = "SELECT * FROM `contactus-request` WHERE fullName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{               
            $sql = "INSERT INTO `contactus-request` (fullName, emailAddress, subject, message) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }                
            else{
                mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $subject, $message);
                mysqli_stmt_execute($stmt);
                header("Location: ../index.php?submit=success");
                exit();
                }          
        }
    }

}
?>