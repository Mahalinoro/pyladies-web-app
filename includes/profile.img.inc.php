<?php

    session_start();

    if(isset($_POST['upload-img'])){

        require "dbh.inc.php";

        $img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $image = file_get_contents($img_tmp);
        $imginfo = @getimagesize($img);
        $width = $imginfo[0];
        $height = $imginfo[1];
        $uid = $_SESSION['userid'];

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );

         // Get image file extension
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
    
        // Validate file input to check if is not empty
        if (empty($img)) {
            header("Location: ../profile.php?error=nofilechosen");
            exit();
        }    // Validate file input to check if is with valid extension
        else if (! in_array($file_extension, $allowed_image_extension)) {
            header("Location: ../profile.php?error=invalidextension");
            exit();
        }    // Validate image file size
        else if (($_FILES["image"]["size"] > 1000000)) {
            header("Location: ../profile.php?error=invalidsize");
            exit();
        }    // Validate image file dimension
        else if ($width > "150" || $height > "150") {
            header("Location: ../profile.php?error=invalidimension");
            exit();
        } else {
            $sql = "SELECT * FROM `profiles-img` WHERE userID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../profile.php?error=sqlerror");
                exit();
            }
            else{                              
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0){
                    $sql = "UPDATE `profiles-img` SET userImg=? WHERE userID=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../profile.php?error=sqlerror");
                        exit();
                    }                
                    else{
                        mysqli_stmt_bind_param($stmt, "ss", $image, $uid);
                        mysqli_stmt_execute($stmt);
                        
                        $check = mysqli_stmt_affected_rows($stmt);
                        if($check==1){
                            header("Location: ../profile.php?upload=success");
                            exit();
                        }else{
                            header("Location: ../profile.php?error=uploadunsuccessful");
                            exit();
                        }                   
                    }
                }
                else{
                    $sql = "INSERT INTO `profiles-img` (userID, userImg) VALUES (?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../profile.php?error=sqlerror");
                        exit();
                    }                
                    else{                            
                        mysqli_stmt_bind_param($stmt, "ss", $uid, $image);
                        mysqli_stmt_execute($stmt);

                        $check = mysqli_stmt_affected_rows($stmt);
                        if($check==1){
                            header("Location: ../profile.php?upload=success");
                            exit();
                        }else{
                            header("Location: ../profile.php?error=uploadunsuccessful");
                            exit();
                        }
                        
                    }

                }
            } 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else if(isset($_POST['delete-img'])){

        require "dbh.inc.php";

        $uid = $_SESSION['userid'];

        $sql = "SELECT * FROM `profiles-img` WHERE userID=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../profile.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0){
                $sql = "DELETE FROM `profiles-img` WHERE userID=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../profile.php?error=sqlerror");
                    exit();
                }                
                else{
                    mysqli_stmt_bind_param($stmt, "s", $uid);
                    mysqli_stmt_execute($stmt);
                    
                    $check = mysqli_stmt_affected_rows($stmt);
                    if($check==1){
                        header("Location: ../profile.php?delete=success");
                        exit();
                    }else{
                        header("Location: ../profile.php?error=deleteunsuccessful");
                        exit();
                    }                   
                }
            }else{
                header("Location: ../profile.php?error=nofiletodelete");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }  
?>