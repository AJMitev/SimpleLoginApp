<?php include_once 'header.php' ?>

<main>
    <?php
        if(isset($_SESSION['u_isAdmin']) && $_SESSION['u_isAdmin'] == 1){
            include_once('views/password-change.html');
        }else{
            header('Location: authentication');
            exit;
        }
    ?>
</main>

<?php include_once 'footer.php' ?>
