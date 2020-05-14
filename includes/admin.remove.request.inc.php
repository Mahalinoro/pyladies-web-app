<?php
if(isset($_GET['requestID'])){

    require "dbh.inc.php";

    $aid = $_GET['requestID'];

    $sql = "SELECT * FROM `contactus-request` WHERE requestID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../admindashboard.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $aid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
            $sql = "DELETE FROM `contactus-request` WHERE requestID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../admindashboard.php?error=sqlerror");
                exit();
            }                
            else{
                mysqli_stmt_bind_param($stmt, "s", $aid);
                mysqli_stmt_execute($stmt);
                
                $check = mysqli_stmt_affected_rows($stmt);
                if($check==1){
                    header("Location: ../admindashboard.php?delete=success");
                    exit();
                }else{
                    header("Location: ../admindashboard.php?error=deleteunsuccessful");
                    exit();
                }                   
            }
        }else{
            header("Location: ../admindashboard.php?error=nothingtodelete");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}  
?>