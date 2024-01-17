<?php

function get_todos()
{
    $stmt = pdo()->prepare("SELECT * FROM `todos` WHERE `user_id` = :user_id");
    $stmt->execute(['user_id' => $_SESSION["user_id"]]);
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $ans = "";
    foreach ($todos as $todo) {
        $ans .= '
        <div class="mt-1 row row-cols-1 col row-cols-sm-2 row-cols-md-1 g-3 card shadow-sm">
        <div class="card-body">
          <p class="card-text">' . $todo["todo"] . '</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <form action="/todos/delete" method="POST">
                    <input name="todo_id" type="hidden" value="' . $todo["id"] . '"/>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                </form>
            </div>
            <small class="text-muted">Deadline:' . $todo["deadline"] . '</small>
          </div>
        </div>
      </div>';
    }
    return $ans;
}

function add_todo()
{
    $stmt = pdo()->prepare("INSERT INTO `todos` (`user_id`, `todo`, `deadline`) VALUES (:user_id, :todo, :deadline)");
    $stmt->execute([
        "user_id" => $_SESSION["user_id"],
        "todo" => $_POST["todo"],
        "deadline" => date("Y-m-d H:i:s", strtotime($_POST['deadline'])),
    ]);
}

function delete_todo()
{
    if (isset($_POST["todo_id"]) && is_numeric($_POST["todo_id"])) {
        $stmt = pdo()->prepare("SELECT * FROM `todos` WHERE `id` = :todo_id");
        $stmt->execute(['todo_id' => intval($_POST["todo_id"])]);
        $todo = $stmt->fetch();
        if ($todo["user_id"] != $_SESSION["user_id"]) {
            flash("This todo does not belongs to current user.");
            header("Location: /");
            die();
        }

        $stmt = pdo()->prepare('DELETE FROM `todos` WHERE `id` = :id');
        $stmt->execute(["id" => intval($_POST["todo_id"])]);
    }
}
