<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="views/styles/signin.css" rel="stylesheet">
    <style type="text/css"></style>
</head>


<body class="text-center container">
    <?php require "views/header.php" ?>
    <form class="form-signin" action="/signup" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <label class="sr-only">login</label>
        <input type="login" name="login" class="form-control" placeholder="Login" required="" autofocus="">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required="">
        <button class="btn w-100 btn-lg btn-primary btn-block" type="submit">Sign up</button>
    </form>

</body>

</html>

</html>