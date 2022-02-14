<?php
require_once('./helpers.php');
require_once('./functions.php');
require_once('./data.php');


$page_content = include_template('main.php', ['posts' => $posts]);
$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => 'readme: популярное'
]);

date_default_timezone_set("Asia/Novosibirsk");

print_r(date('d:m:Y H:i:s'));

print($layout_content);
