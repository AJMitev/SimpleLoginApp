<?php
session_start();
require 'dbh.inc.php';


if (isset($_POST['submit'])){
    $oldPwd = mysqli_real_escape_string($conn, $_POST['old_pwd']);
    $pwd = mysqli_real_escape_string($conn, $_POST['new_pwd']);
    $currentUser = $_SESSION['u_id'];


    //Error handlers
    //Check for empty fields
    if (empty($_POST['old_pwd']) || empty($_POST['new_pwd']) ||empty($_POST['rnew_pwd'])){
        header("Location: ../password-change.php?change=empty");
        exit();
    }else{
        //Check if both password match
        if($_POST['new_pwd'] !== $_POST['rnew_pwd']){
            header("Location: ../password-change.php?change=didntmatch");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE user_id='$currentUser'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck < 1){
                header("Location: ../password-change.php?change=error");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //De-hashing the password
                    $hashedPwdCheck = password_verify($oldPwd, $row['user_pwd']);
                    if ($hashedPwdCheck == false) {
                        header("Location: ../password-change.php?change?login=wrongcurrentpassword");
                        exit();
                    } elseif ($hashedPwdCheck == true) {
                        //Hashing the password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        //Change the user into the database
                        $sql = "UPDATE users SET user_pwd='$hashedPwd' WHERE user_id='$currentUser'";

                        mysqli_query($conn, $sql);
                        header("Location: ../password-change.php?change=success");
                        exit();
                    }

                }
            }

        }

    }
}