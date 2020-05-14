<?php
if (isset($_POST['register-event'])){
    require 'dbh.inc.php';

    $eventName = $_POST['eventname'];
    $userName = $_POST['username'];
    $yes = $_POST['yes'];
    $no = $_POST['no'];


    if (empty($eventName) || empty($userName)){
        header("Location: ../event.registration.php?error=emptyfields&eventName=".$eventName."&username=".$userName);
        exit();
    }
    else if (!empty($yes)){    
        $sql = "SELECT userName FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../event.registration.php?error=sqlerror");
            exit();
        }
        else{            
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
                $sql = "INSERT INTO `events-signup` (eventName, userName) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../event.registration.php?error=sqlerror");
                    exit();
                }                
                else{
                    mysqli_stmt_bind_param($stmt, "ss", $eventName, $userName);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../event.registration.php?registration=success");
                    exit();
                }
            }
            else{                
                header("Location: ../event.registration.php?error=invaliduser");
                exit();
            }                
            
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../event.registration.php?");
}

?>