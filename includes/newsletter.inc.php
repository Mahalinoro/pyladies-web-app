<?php

if(isset($_POST['newsletter-submit'])){

    require "dbh.inc.php";

    $email = $_POST['email'];


    if(empty($email)){
        header("Location: ../index.php?error=emptyfields&email=".$email);
        exit();
    }

    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.php?error=invalidmail");
        exit();
    }
    else{
        $sql = "SELECT * FROM `newsletters-subscription` WHERE emailAddress=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{               
            $sql = "INSERT INTO `newsletters-subscription` (emailAddress) VALUES (?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }                
            else{
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                header("Location: ../index.php?subscription=success");
                exit();
                }          
        }
    }

}

?>