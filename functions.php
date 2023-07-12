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

function esc($str)
{
    $text = htmlspecialchars($str);
    return $text;
};

function calcRelativeTime($ts)
{
    $now = time();
    $diff_sec = $now - $ts;

    $minutes60 = 60 * 60;
    $hours24 = 24 * 3600;
    $days7 = 7 * 86400;
    $weeeks5 = 5 * 604800;
    $result = '';

    if ($diff_sec < $minutes60) {
        $minuts = ceil($diff_sec / 60);
        $result = $minuts . ' ' . get_noun_plural_form($minuts, 'минута', 'минуты', 'минут');
    } else if ($diff_sec >= $minutes60 && $diff_sec < $hours24) {
        $hours = ceil($diff_sec / 3600);
        $result = $hours . ' ' . get_noun_plural_form($hours, 'час', 'часа', 'часов');
    } else if ($diff_sec >= $hours24 && $diff_sec < $days7) {
        $days = ceil($diff_sec / 86400);
        $result = $days . ' ' . get_noun_plural_form($days, 'день', 'дня', 'дней');
    } else if ($diff_sec >= $days7 && $diff_sec < $weeeks5) {
        $weeks = ceil($diff_sec / 604800);
        $result = $weeks . ' ' . get_noun_plural_form($weeks, 'неделя', 'недели', 'недель');
    } else {
        $months = ceil($diff_sec / 2629743);
        $result = $months . ' ' . get_noun_plural_form($months, 'месяц', 'месяца', 'месяцев');
    }

    return $result . ' назад';
}

function select_query($con, $query)
{
    $result = mysqli_query($con, $query);

    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
    };

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
