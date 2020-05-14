<?php
    session_start();

    if(isset($_POST['update-info'])){

        require "dbh.inc.php";

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $username = $_POST['username'];
        $dateofbirth = $_POST['dateofbirth'];
        $email = $_POST['email'];
        $uid = $_SESSION['userid'];

        if (empty($fname) || empty($lname) || empty($username) || empty($dateofbirth) || empty($email)){
            header("Location: ../profile.php?error=emptyfields&firstname=".$fname."&lastname=".$lname."&username=".$username."&dateofbirth=".$dateofbirth);
            exit();
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../profile.php?error=invalidmailusername&firstname=".$fname."&lastname=".$lname."&dateofbirth=".$dateofbirth);
            exit();
        }    
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../profile.php?error=invalidmail&firstname=".$fname."&lastname=".$lname."&username=".$username."&dateofbirth=".$dateofbirth);
            exit();
        }        
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../signup.php?error=invalidusername&firstname=".$fname."&lastname=".$lname."&dateofbirth=".$dateofbirth."&email=".$email);
            exit();
        }
        else{
            $sql = "SELECT * FROM users WHERE userName=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../profile.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("Location: ../profile.php?error=usertaken&firstname=".$fname."&lastname=".$lname."&dateofbirth=".$dateofbirth."&email=".$email);
                    exit();
                }
                else{
                    $sql = "UPDATE users SET firstName=?, lastName=?, userName=?, dateOfBirth=?, emailAddress=? WHERE userID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../profile.php?error=sqlerror");
                        exit();
                    }                
                    else{
                        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $username, $dateofbirth ,$email, $uid);
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