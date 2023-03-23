<?php
function narodowosc($kraj)
{
    $nacja = array(
        'Polska' => 'Polak',
        'Hiszpania' => 'Hiszpan',
        'Serbia' => 'Serb',
    );

    if (isset($nacja[$kraj])) {
        return $nacja[$kraj];
    } else {
        return 'Nieznana narodowość';
    }
}

$kraj = 'Hiszpania';
echo "Moja narodowosc to: " . narodowosc($kraj);

?>