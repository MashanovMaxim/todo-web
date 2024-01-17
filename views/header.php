<?php
$user = null;

if (check_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">TODOS</h5>
    <nav class="my-2 my-md-0 mr-md-3 ml-1">
        <a class="p-2 text-dark" href="/signin">sign in</a>
        <a class="p-2 text-dark" href="/signup">sign up</a>
        <?php if ($user != null)
            echo '<a class="p-2 text-dark" href="/logout">log out</a>';
        ?>
    </nav>

    <?php if ($user != null)
        echo '<label class="p-2 text-dark">You signed as ' . $user["login"] . '</label>';
    ?>
    <a class="btn btn-outline-primary" href="/">Home</a>

</div>