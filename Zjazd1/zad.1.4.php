<?php


function get_birthday_from_pesel($pesel): string
{
    $dzien = substr($pesel, 4, 2);
    $miesiac = substr($pesel, 2, 2);
    $rok = substr($pesel, 0, 2);

    if ($miesiac > 20) {
        $miesiac = $miesiac - 20 < 10
            ? "0" . ($miesiac - 20)
            : $miesiac - 20;
    }

    return "Data urodzenia: $dzien-$miesiac-$rok";
}


echo get_birthday_from_pesel("99102301759");
?>

