<?php
require_once('./helpers.php');
require_once('./functions.php');
require_once('./data.php');
date_default_timezone_set("Asia/Novosibirsk");

$con = mysqli_connect("localhost", "root", "", "readme");
mysqli_set_charset($con, "utf8");

$categories_sql = "SELECT id, name, icon_class FROM categories";
$categories_result = mysqli_query($con, $categories_sql);
$categories = mysqli_fetch_all($categories_result, MYSQLI_ASSOC);

$posts_sql = "SELECT p.title, u.name, c.name
FROM posts p JOIN users u ON p.user_id = u.id
JOIN categories c ON p.category_id = c.id
ORDER BY show_count DESC";
$posts_result = mysqli_query($con, $posts_sql);
$posts = mysqli_fetch_all($posts_result, MYSQLI_ASSOC);

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
