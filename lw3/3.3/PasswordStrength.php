<?php
// пароль
$password = isset($_GET['password']) ? (string) $_GET['password'] : null;
if ($identifier !== '' && ctype_alnum($identifier))
{
    $length = strlen($password); // длинна пароля
    $repeatedChar = 0; // кол-во повторяющихся символов
    $quantityDigits = 0; // кол-во цифр
    $charUpper = 0; // кол-во букв верхнего регистра
    $charLower = 0; // кол-во букв нижнего регистра
    /*
     * Вычисление кол-ва повторяющихся символов
     * count_chars() - подсчитывает кол-во вхождений каждого из символов
     * и формирует массив данных
     */
    foreach (count_chars($password) as $number)
    {
        // если количество символов больше 1, тогда <повторяющиеся символы> + <кол-во символов>
        $number > 1 ? $repeatedChar = $repeatedChar + $number : null;
    }
    // вычисление кол-ва цифр, символов нижнего и верхнего регистра
    foreach (str_split($password , 1 ) as $char)
    {
        // если $char число, то $quantityDigits + 1
        ctype_digit($char) ? $quantityDigits++ : null;
        // если $char буква в верх. регистре, то $charUpper + 1
        ctype_upper($char) ? $charUpper++ : null;
        // если $char буква в ниж. регистре, то $charLower + 1
        ctype_lower($char) ? $charLower++ : null;
    }
    /*
     * Вычисление надежности
     */
    // надежность пароля
    $strength = 0;
    // 4 * <длинна>
    $strength = $strength + 4 * $length;
    // 4 * <кол-во цифр>
    $strength = $strength + 4 * $quantityDigits;
    // если букв в верх. рег. больше 0, то (<длинна> - <буквы в верх.рег>) *2
    $charUpper > 0 ? $strength = $strength + ($length - $charUpper) * 2 : null;
    // если букв в ниж. рег. больше 0, то (<длинна> - <буквы в ниж.рег>) *2
    $charLower > 0 ? $strength = $strength + ($length - $charLower) * 2 : null;
    // если пароль состоит только из букв, то <надежность> - <длинна>
    ctype_alpha($password) ? $strength = $strength - $length : null;
    // если пароль состоит только из цифр, то <надежность> - <длинна>
    ctype_digit($password) ? $strength = $strength - $length : null;
    // <надежность> - <повторяющиеся символы>
    $strength = $strength - $repeatedChar;

    header("Content-Type: text/plain");
    echo $strength;
}


