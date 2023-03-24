
<?php


function rollDice($sides)
{
    $result = rand(1, $sides);
    return $result;
}
$result = rollDice(6);
echo "Wynik: " . $result;

?>

