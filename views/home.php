<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="views/styles/header.css" </head>

<body class="container">
  <?php require 'header.php' ?>
  <?php if ($user == null): ?>
    <h1>Sign in to see todos</h1>
  <?php else: ?>
    <a class="btn btn-outline-success" href="/todos/add">Add new todo</a>
    <?php echo get_todos(); ?>
  <?php endif; ?>

</body>

</html>