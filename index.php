<?php
require_once('./helpers.php');
require_once('./functions.php');
require_once('./data.php');
date_default_timezone_set("Asia/Novosibirsk");

$page_content = include_template('main.php', ['posts' => $posts]);
$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => 'readme: популярное'
]);

print($layout_content);
