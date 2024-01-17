<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add new todo</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="views/styles/signin.css" rel="stylesheet">
    <style type="text/css"></style>
</head>
<body class="text-center container">
    <?php require "views/header.php" ?>
    <form class="w-50 mx-auto" action="/todos/add" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Fill out todo</h1>
        <label class="sr-only">To do</label>
        <textarea name="todo" class="form-control" placeholder="To do" required autofocus></textarea>
        <label class="sr-only mt-3">Date</label>
        <input type="datetime-local" name="deadline" class="form-control" required autofocus>
        <button class="btn mt-3 w-100 btn-lg btn-success btn-block" type="submit">Create</button>
    </form>
</body>