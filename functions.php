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
