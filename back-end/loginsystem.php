<?php
    session_start();

    require("db.php");

    if (isset($_POST["valid"])) {
        if(!empty($_POST['username'] AND !empty($_POST['password']))){

            $user = $_POST['username'];
            $password = $_POST['password'];

            $check = $bdd->prepare("SELECT * FROM users WHERE username = ?");
            $check->execute(array($user));

            if ($check->rowCount() > 0) {

                $userinfos = $check->fetch();

                if ($password == $userinfos['passwd']) {
                    $_SESSION['auth'] = true;
                    $_SESSION['username'] = $userinfos['username'];
                    header('Location: ../principale.php');

                }
            }
        }
    }
?>