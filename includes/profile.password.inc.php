<?php
    session_start();

    if(isset($_POST['update-password'])){

        require "dbh.inc.php";

        $password = $_POST['password'];
        $passwordRepeat = $_POST['repeatpassword'];
        $uid = $_SESSION['userid'];

        if(empty($password) || empty($passwordRepeat)){
            header("Location: ../profile.php?error=emptypassword");
            exit();
        }
        else if($password !== $passwordRepeat){
            header("Location: ../profile.php?error=passwordcheck");
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE userID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../profile.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    $sql = "UPDATE users SET password=? WHERE userID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../profile.php?error=sqlerror");
                        exit();
                    }                
                    else{
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $uid);
                        mysqli_stmt_execute($stmt);                    
                        $check = mysqli_stmt_affected_rows($stmt);
                        if($check==1){
                            header("Location: ../profile.php?update=success");
                            exit();
                        }else{
                            header("Location: ../profile.php?error=updateunsuccessful");
                            exit();
                        }                   
                    }
                } 
            }
        }
    }

?>