<?php
if (isset($_POST['admin-login'])){

    require 'dbh.inc.php';

    $userName = $_POST['username'];
    $password = $_POST['password'];


    if (empty($userName) || empty($password)){
        header("Location: ../adminlogin.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM `admin` WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../adminlogin.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../adminlogin.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userid'] = $row['userID'];
                    $_SESSION['username'] = $row['userName'];

                    header("Location: ../admindashboard.php?login=sucess");
                    exit();
                }
            }else{
                header("Location: ../adminlogin.php?error=invaliduser");
            }         
        }
    }
}
else{
    header("Location: ../index.php?");
}
?>