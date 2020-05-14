<?php
if(isset($_GET['postID'])){

    require "dbh.inc.php";

    $aid = $_GET['postID'];

    $sql = "SELECT * FROM blogs WHERE postID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../blogs.admin.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $aid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
            $sql = "DELETE FROM  blogs WHERE postID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../blogs.admin.php?error=sqlerror");
                exit();
            }                
            else{
                mysqli_stmt_bind_param($stmt, "s", $aid);
                mysqli_stmt_execute($stmt);
                
                $check = mysqli_stmt_affected_rows($stmt);
                if($check==1){
                    header("Location: ../blogs.admin.php?delete=success");
                    exit();
                }else{
                    header("Location: ../blogs.admin.php?error=deleteunsuccessful");
                    exit();
                }                   
            }
        }else{
            header("Location: ../blogs.admin.php?error=nothingtodelete");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}  
?>