<?php
$is_auth = rand(0, 1);

$user_name = 'Мария Орлова'; // укажите здесь ваше имя

$categories_sql = "SELECT id, name, icon_class FROM categories";
$posts_sql = "SELECT p.title, p.description, p.img_path, p.quote_author, p.video_path, p.site_link, u.name AS username, u.avatar_path AS avatar, c.icon_class AS type
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN categories c ON p.category_id = c.id
    ORDER BY show_count DESC
    LIMIT 6";
