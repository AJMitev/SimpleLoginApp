<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    header('Location: authentication');
    exit;
}?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="styles/flaty.css">
    <link rel="stylesheet" href="styles/special.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.ico">
    <script href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="scripts/jquery-1.10.2.js"></script>
    <title>Simple Login System</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/keys.png" class="d-inline-block align-top brand-navbarlogo"
                     alt="logo">
                <span class="brand-name">Simple Login System</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                </ul>
                <div class="nav-login">
                    <?php
                    if (isset($_SESSION['u_email'])) {
                        $username = $_SESSION['u_email'];

                        if (isset($_SESSION['u_isAdmin'])) {
                            $adminType = intval($_SESSION['u_isAdmin']);
                            if ($adminType === 1) {
                                echo "<form action='' method='POST'>
                                    <button type='submit' name='submit' class='btn btn-outline-dark'>Manage</button>
                                    </form>";
                            }
                        }

                        echo "<form action='includes/logout.inc.php' method='POST'>
                        <button type='submit' name='submit' class='btn btn-outline-danger'>Logout</button>
                    </form>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>