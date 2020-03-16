<?php
if (isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $dateOfBirth = $_POST['dateofbirth'];
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['repeatpassword'];

    if (empty($firstName) || empty($lastName) || empty($userName) || empty($dateOfBirth) || empty($emailAddress) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&firstname=".$firstName."&lastname=".$lastName."&username=".$userName."&dateofbirth=".$dateOfBirth."&email=".$emailAddress);
        exit();
    }
    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=invalidmailusername&firstname=".$firstName."&lastname=".$lastName."&dateofbirth=".$dateOfBirth);
        exit();
    }

    else if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&firstname=".$firstName."&lastname=".$lastName."&username=".$userName."&dateofbirth=".$dateOfBirth);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=invalidusername&firstname=".$firstName."&lastname=".$lastName."&dateofbirth=".$dateOfBirth."&email=".$emailAddress);
        exit();
    }
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&firstname=".$firstName."&lastname=".$lastName."&username=".$userName."&dateofbirth=".$dateOfBirth."&email=".$emailAddress);
        exit();
    }
    else{
        $sql = "SELECT userName FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{            
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&firstname=".$firstName."&lastname=".$lastName."&dateofbirth=".$dateOfBirth."&email=".$emailAddress);
                exit();
            }
            else{                
                $sql = "INSERT INTO users (firstName, lastName, userName, dateOfBirth, emailAddress, password) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }                
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $lastName, $firstName, $userName, $dateOfBirth, $emailAddress, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }                
            
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../signup.php?");
}

?>