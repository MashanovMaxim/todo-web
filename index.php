<?php
require_once __DIR__ . '/boot.php';
require_once __DIR__ . '/users.php';
require_once __DIR__ . '/todos.php';

$request = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];
$view_dir = "/views/";

flash();
switch ($request) {
    case '/':
        require __DIR__ . $view_dir . 'home.php';
        break;
    case '/signup':
        if ($request_method == "POST") {
            signup();
            header('Location: /signin');
            die();
        } else
            require __DIR__ . $view_dir . 'signup.php';
        break;
    case '/signin':
        if ($request_method == "POST") {
            signin();
            header('Location: /');
            die();

        } else
            require __DIR__ . $view_dir . 'signin.php';
        break;
    case '/logout':
        logout();
        header('Location: /');
        die();
    case '/todos/add':
        if ($request_method == "POST") {
            add_todo();
            header('Location: /');
            die();
        } else
            require __DIR__ . $view_dir . 'todo_add.php';
        break;
    case '/todos/delete':
        if ($request_method == 'POST') {
            delete_todo();
        }
        header('Location: /');
        die();
    default:
        http_response_code(404);
}
