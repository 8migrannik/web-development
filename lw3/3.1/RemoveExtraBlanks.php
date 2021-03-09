<?php

$text = isset($_GET['text']) ? $_GET['text'] : null;

if (is_string($text) && $text !== '')
{
    // убираем лишние пробелы в начале и в конце строки
    $text = trim($text);
    $temp = '';
    while ($text !== $temp)
    {
        $temp = $text;
        // замена 2х пробелов на 1
        $text = str_replace('  ', ' ', $text);
    }

    header("Content-Type: text/plain");
    echo $text;
}
