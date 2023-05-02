<?php

//post method to check if they got here legit
if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';
    $conn = mysqli_connect("localhost", "root", "", "church");


    $mailuid = mysqli_real_escape_string($conn,$_POST['mailuid']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);

    if(empty($mailuid) || empty($password)){
        header("Location: ../donations.php?error=emptyFields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../donations.php?error=sqlError");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if(!$pwdCheck){
                    header("Location: ../donations.php?error=wrongPwd");
                    exit();
                }
                elseif($pwdCheck) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../donations.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../donations.php?error=noUser");
                    exit();
                }
            }
            else{
                header("Location: ../donations.php?error=noUser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../donations.php");
    exit();
}