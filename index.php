<?php
require_once('./helpers.php');
require_once('./functions.php');
require_once('./data.php');
require_once('./config.php');

date_default_timezone_set("Asia/Novosibirsk");

$con = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

if (!$con) {
    print("Ошибка подключения: " . mysqli_connect_error());
} else {
    $categories = select_query($con, $categories_sql);
    $posts = select_query($con, $posts_sql);
}

$page_content = include_template('main.php', [
    'posts' => $posts,
    'categories' => $categories
]);
$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => 'readme: популярное'
]);

print($layout_content);
