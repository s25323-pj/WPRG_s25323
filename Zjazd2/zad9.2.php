<!DOCTYPE html>
<html>
<body>
<?php
function factorialRecursive($n)
{
    if ($n === 0 || $n === 1) {
        return 1;
    } else {
        return $n * factorialRecursive($n - 1);
    }
}

function fibonacciRecursive($n)
{
    if ($n === 0 || $n === 1) {
        return $n;
    } else {
        return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
    }
}

function factorialNonRecursive($n)
{
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function fibonacciNonRecursive($n)
{
    if ($n === 0 || $n === 1) {
        return $n;
    }
    $a = 0;
    $b = 1;
    for ($i = 2; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    return $b;
}

$start = microtime(true);

$arg = 10;
$result1 = factorialRecursive($arg);
echo "Silnia z $arg (rekurencyjnie): $result1<br>";

$result2 = factorialNonRecursive($arg);
echo "Silnia z $arg (nierkurencyjnie): $result2<br>";

$end = microtime(true);
$time1 = $end - $start;

$start = microtime(true);


$arg = 20;
$result3 = fibonacciRecursive($arg);
echo "Ciąg Fibonacciego dla $arg (rekurencyjnie): $result3<br>";


$result4 = fibonacciNonRecursive($arg);
echo "Ciąg Fibonacciego dla $arg (nierkurencyjnie): $result4<br>";

$end = microtime(true);
$time2 = $end - $start;

if ($time1 < $time2) {
    $faster = "rekurencyjna";
    $difference = $time2 / $time1;
} else {
    $faster = "nierkurencyjna";
    $difference = $time1 / $time2;
}

echo "Funkcja $faster działała szybciej o $difference razy.<br>";
?>

</body>
</html>

