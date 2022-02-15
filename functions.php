<?php
function cutText($text, $max = 300)
{
    $array = explode(' ', $text);
    $result = [];
    $count = 0;
    $readmore = '';

    foreach ($array as $item) {
        if ($count > $max) {
            $readmore = '<a class="post-text__more-link" href="#">Читать далее</a>';
            $result[] = '...';
            break;
        }
        $count += strlen($item) + 1;
        $result[] = $item;
    }

    return '<p>' . implode(' ', $result) . '</p>' . $readmore;
};

function esc($str) {
    $text = htmlspecialchars($str);
    return $text;
};

function calcRelativeTime($ts) {
    $now = time();
    $diff_sec = $now - $ts;
    $sec_in_minutus = 60;
    $sec_in_hour = 3600;
    $sec_in_day = 86400;
    $sec_in_week = 604800;

    $ago = floor($diff_sec / $sec_in_day);
    return $ago . ' дней назад';
}
