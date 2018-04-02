<?php

if (isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email)|| empty($pwd)){
        header("Location: ../register.php?register=empty");
        exit();
    }else{
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){

            header("Location: ../register.php?register=invalid");
            exit();
        }else{
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../register.php?register=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE user_uid ='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    header("Location: ../register.php?register=useristaken");
                    exit();
                }else{
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_pwd, isAdmin) VALUES ('$first', '$last', '$email', '$hashedPwd', '0');";

                    mysqli_query($conn, $sql);
                    header("Location: ../register.php?register=success");
                    exit();
                }
            }
        }
    }

}else {
    header("Location: ../register.php");
    exit();
}