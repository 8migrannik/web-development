<?php
function getGETParameter(string $name): ?string
{
    return isset($_GET[$name]) ? (string) $_GET[$name] : null;
}
header("Content-Type: text/plain");
$firstName = getGETParameter('first_name');
$lastName = getGETParameter('last_name');
$email = getGETParameter('email');
$age = getGETParameter('age');
if (isset($email) && $email !== '')
{
    $file = fopen(__DIR__ . '/data/' . $email . '.txt', 'w');
    $text = (isset($firstName) ? 'first_name=' . $firstName : null)
     . (isset($lastName) ? '&last_name=' . $lastName : null)
     . '&email=' . $email
     . (isset($age) ? '&age=' . $age : null);
    fwrite($file, $text);
    fclose($file);
    echo 'Информация записана';
}

