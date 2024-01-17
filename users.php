<?php

function signin()
{
    if (!isset($_POST["login"]) || !isset($_POST["password"])) {
        flash("Fields not filled.");
        header("Location: /signin");
        die();
    }

    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :login");
    $stmt->execute(['login' => $_POST['login']]);
    if (!$stmt->rowCount()) {
        flash('User with this login not found.');
        header("Location: /signin");
        die();
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_POST['password'] == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: /');
        die;
    }
    flash('Wrong password.');
    header("Location: /signin");
    die();
}

function signup()
{
    if (!isset($_POST["login"]) || !isset($_POST["password"])) {
        flash("Fields not filled.");
        header("Location: /signup");
        die();
    }

    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `login` = :login");
    $stmt->execute(['login' => $_POST['login']]);
    if ($stmt->rowCount() > 0) {
        flash('This login already taken.');
        header("Location: /signup");
        die();
    }

    $stmt = pdo()->prepare("INSERT INTO `users` (`login`, `password`) VALUES (:login, :password)");
    $stmt->execute([
        'login' => $_POST['login'],
        'password' => $_POST['password'],
    ]);

    header('Location: /login');
}

function logout()
{
    $_SESSION['user_id'] = null;
    header('Location: /');
}
