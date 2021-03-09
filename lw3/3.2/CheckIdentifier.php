<?php

$identifier = isset($_GET['identifier']) ? $_GET['identifier'] : null;

header("Content-Type: text/plain");
if (is_string($identifier) && $identifier !== '')
{
    if (ctype_alpha(substr($identifier, 0, 1)))
    {
        echo ctype_alnum($identifier) ?  'Yes' : 'No' . PHP_EOL 
         . 'Идентификатор содержит не только цифры и буквы.';
    }
    else
    {
        echo 'No' . PHP_EOL . 'Первый символ идентификатора не является буквой.' . PHP_EOL
         . (ctype_alnum($identifier) ? null : 'Идентификатор содержит не только цифры и буквы.');
    }
}
