<?php
if (isset($_POST['organizer-info'])){
    require 'dbh.inc.php';

    $fullName = $_POST['fname'];
    $title = $_POST['title'];
    $phoneNumber = $_POST['pnumber'];
    $emailAddress = $_POST['email'];
    $interest = $_POST['interest'];
    $skills = $_POST['skills'];
    $info = $_POST['true'];
    $codeOfConduct = $_POST['codeofconduct'];

    if (empty($fullName) || empty($title) || empty($phoneNumber) || empty($emailAddress) || empty($interest) || empty($skills) || empty($info) || empty($codeOfConduct)){
        header("Location: ../becomeanorganizer.php?error=emptyfields&fullname=".$fullName."&title=".$title."&phonenumber=".$phoneNumber."&skills=".$skills);
        exit();
    }
    else if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        header("Location: ../becomeanorganizer.php?error=invalidmail&ullname=".$fullName."&title=".$title."&phonenumber=".$phoneNumber."&skills=".$skills);
        exit();
    }
    else{
        $sql = "SELECT * FROM `organizer-application` WHERE fullName=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../becomeanorganizer.php?error=sqlerror");
            exit();
        }
        else{            
            mysqli_stmt_bind_param($stmt, "s", $fullName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);           
            $sql = "INSERT INTO `organizer-application` (fullName, title, phoneNumber, emailAddress, interest, skills) VALUES (?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../becomeanorganizer.php?error=sqlerror");
                exit();
            }                
            else{
                mysqli_stmt_bind_param($stmt, "ssssss", $fullName, $title, $phoneNumber, $emailAddress, $interest, $skills);
                mysqli_stmt_execute($stmt);
                header("Location: ../index.php?application=success");
                exit();
            }                            
            
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../index.php?");
}

?>