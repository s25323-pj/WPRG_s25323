
<?php
function tMnoz($dlug) {
    for ($i = 1; $i <= $dlug; $i++) {
        for ($j = 1; $j <= $dlug; $j++) {
            $result = $i * $j;
            echo $result . " ";
        }
        echo"<br>";
        echo "\n";
    }
}

$userInput = 7;

tMnoz($userInput);
?>