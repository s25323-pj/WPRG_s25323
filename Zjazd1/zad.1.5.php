<?php
function calculateArea()
{
    $ksztalt = readline("Jaka figure chcesz obliczyc (trojkąt, prostokat, trapez)? ");
    switch ($ksztalt) {
        case "trójkat":
            poleTrojkata();
            break;
        case "prostokat":
            poleProstokata();
            break;
        case "trapez":
            poleTrapezu();
            break;
        default:
            echo "Nieznana figura!";
            break;
    }
}

function poleTrojkata()
{
    $podstawa = readline("Podaj długość podstawy: ");
    $wysokosc = readline("Podaj wysokość: ");
    $pole = 0.5 * $podstawa * $wysokosc;
    echo "Pole trojkata wynosi: " . $pole;
}

function poleProstokata()
{
    $szerokosc = readline("Podaj długość: ");
    $dlugosc = readline("Podaj szerokość: ");
    $pole = $szerokosc * $dlugosc;
    echo "Pole prostokata wynosi: " . $pole;
}

function poleTrapezu()
{
    $podstawa1 = readline("Podaj długość pierwszej podstawy: ");
    $podstawa2 = readline("Podaj długość drugiej podstawy: ");
    $wysokosc = readline("Podaj wysokość: ");
    $pole = 0.5 * ($podstawa1 + $podstawa2) * $wysokosc;
    echo "Pole trapezu wynosi: " . $pole;
}

calculateArea();
?>