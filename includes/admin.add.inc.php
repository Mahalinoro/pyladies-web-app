<?php
if (isset($_POST['admin-add'])){
    require 'dbh.inc.php';

    $fullName = $_POST['fname'];
    $userName = $_POST['username'];
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];

    if (empty($fullName) || empty($userName) || empty($emailAddress) || empty($password)){
        header("Location: ../admindashboard.php?error=emptyfields&fullname=".$fullName."&username=".$userName."&email=".$emailAddress);
        exit();
    }
    else if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        header("Location: ../admindashboard.php?error=invalidmail&fullname=".$fullName."&username=".$userName);
        exit();
    }    
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../admindashboard.php?error=invalidusername&fullname=".$fullName."&email=".$emailAddress);
        exit();
    }
    else{
        $sql = "SELECT userName FROM `admin` WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../admindashboard.php?error=sqlerror");
            exit();
        }
        else{            
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
                header("Location: ../admindashboard.php?error=usertaken&fullname=".$fullName."&email=".$emailAddress);
                exit();
            }
            else{                
                $sql = "INSERT INTO `admin` (fullName, userName, emailAddress, password) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../admindashboard.php?error=sqlerror");
                    exit();
                }                
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $userName, $emailAddress, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../admindashboard.php?signup=success");
                    exit();
                }
            }                
            
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../admindashboard.php?");
}

?>