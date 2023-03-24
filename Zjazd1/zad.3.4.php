<?php
function lpierw($numer)
{
    if ($numer <= 1) {
        return false;
    }

    $iteracje = 0;
    for ($i = 2; $i <= sqrt($numer); $i++) {
        $iteracje++;
        if ($numer % $i == 0) {
            return false;
        }
    }

    echo "Ilosc iteracji pętli: " . $iteracje . "\n";
    echo "<br>";
    echo "\n";
    return true;

}

$numer = 29;
if (lpierw($numer)) {
    echo $numer . " to liczba pierwsza.";
} else {
    echo $numer . " to nie liczba pierwsza.";
}
?>
