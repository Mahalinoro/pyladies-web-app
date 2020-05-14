<?php
   if(isset($_POST['add-post'])){

        require "dbh.inc.php";

        $img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $image = file_get_contents($img_tmp);
        $imginfo = @getimagesize($img);
        $width = $imginfo[0];
        $height = $imginfo[1];

        $postAuthor = $_POST['author'];
        $postTitle = $_POST['title'];
        $postDate = $_POST['date'];
        $postDescription = $_POST['description'];
        $postContent = $_POST['content'];

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );

         // Get image file extension
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
    
        // Validate file input to check if is not empty
        if (empty($img)) {
            header("Location: ../blogs.admin.php?error=nofilechosen");
            exit();
        }
        else if(empty($img) | empty($postAuthor) | empty($postTitle) | empty($postDate) | empty($postDescription) |empty($postContent)){
            header("Location: ../blogs.admin.php?emptyfields&postauthor=".$postAuthor."&posttitle=".$postTitle."&postdate=".$postDate."&postdescription=".$postDescription."&postcontent=".$postContent);
            exit();
        }
        else if (! in_array($file_extension, $allowed_image_extension)) {
            header("Location: ../blogs.admin.php?error=invalidextension");
            exit();
        }    // Validate image file size  
        else {
            $sql = "SELECT * FROM blogs WHERE postAuthor=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../blogs.admin.php?error=sqlerror");
                exit();
            }
            else{                             
                $sql = "INSERT INTO blogs (postAuthor, postTitle, postDescription, postContent, postDate, postImage) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../blogs.admin.php?error=sqlerror");
                    exit();
                }                
                else{                            
                    mysqli_stmt_bind_param($stmt, "ssssss", $postAuthor, $postTitle, $postDescription, $postContent, $postDate, $image);
                    mysqli_stmt_execute($stmt);

                    $check = mysqli_stmt_affected_rows($stmt);
                    if($check==1){
                        header("Location: ../blogs.admin.php?upload=success");
                        exit();
                    }else{
                        header("Location: ../blogs.admin.php?error=uploadunsuccessful");
                        exit();
                    }                    
                }                
            } 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
?>