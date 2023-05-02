<?php

//post method to check if they got here legit
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';
    $conn = mysqli_connect("localhost", "root", "", "church");

    // mysqli_real_escape_string() used so that escape special characters in a string
    //help prevent php injection
    $fullname = mysqli_real_escape_string($conn,$_POST['name']);
    $username = mysqli_real_escape_string($conn,$_POST['uid']);
    $email = mysqli_real_escape_string($conn,$_POST['mail']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    $passwordRepeat = mysqli_real_escape_string($conn,$_POST['pwd-repeat']);

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
        header("Location: ../signup.php?error=empty_Fields&uid=".$username."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalid_Email_Uid");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalid_Email&uid=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalid_Uid&mail=".$email);
        exit();
    }
    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordCheck&uid=".$username."&mail=".$email);
        exit();
    }
    else{
        // prepared statement is safer so no php injection
        $sql = "SELECT uidUsers FROM users WHERE uidUsers =?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlError");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../signup.php?error=userTaken&mail=".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO users (nameUsers,uidUsers, emailUsers, pwdUsers) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlError");
                    exit();
                }
                else{
                    // hash password for security
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../signup.php?error=sqlError");
    exit();
}
