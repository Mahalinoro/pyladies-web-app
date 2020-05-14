<?php
   if(isset($_POST['add-event'])){

        require "dbh.inc.php";

        $img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $image = file_get_contents($img_tmp);
        $imginfo = @getimagesize($img);
        $width = $imginfo[0];
        $height = $imginfo[1];

        $eventName = $_POST['name'];
        $eventDate = $_POST['date'];
        $eventFromTime = $_POST['fromTime'];
        $eventToTime = $_POST['toTime'];
        $eventLocation = $_POST['location'];
        $eventDescription = $_POST['description'];

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );

         // Get image file extension
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
    
        // Validate file input to check if is not empty
        if (empty($img)) {
            header("Location: ../events.admin.php?error=nofilechosen");
            exit();
        }
        else if(empty($img) | empty($eventName) | empty($eventDate) | empty($eventFromTime) | empty($eventToTime) | empty($eventLocation)){
            header("Location: ../events.admin.php?emptyfields&eventname=".$eventName."&eventdate=".$eventDate."&eventfromtime=".$eventFromTime."&eventtotime=".$eventToTime."&eventlocation=".$eventLocation);
            exit();
        }
        else if (! in_array($file_extension, $allowed_image_extension)) {
            header("Location: ../events.admin.php?error=invalidextension");
            exit();
        }    // Validate image file size  
        else {
            $sql = "SELECT * FROM events WHERE eventName=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../events.admin.php?error=sqlerror");
                exit();
            }
            else{                             
                $sql = "INSERT INTO events (eventName, eventDescription, eventDate, eventLocation, eventFromTime, eventToTime, eventImage) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../events.admin.php?error=sqlerror");
                    exit();
                }                
                else{                            
                    mysqli_stmt_bind_param($stmt, "sssssss", $eventName, $eventDescription, $eventDate, $eventLocation, $eventFromTime, $eventToTime, $image);
                    mysqli_stmt_execute($stmt);

                    $check = mysqli_stmt_affected_rows($stmt);
                    if($check==1){
                        header("Location: ../events.admin.php?upload=success");
                        exit();
                    }else{
                        header("Location: ../events.admin.php?error=uploadunsuccessful");
                        exit();
                    }                    
                }                
            } 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
?>