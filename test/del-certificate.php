<?php

use Certificate\Models\Certificate;

require "../vendor/autoload.php";

$tml = new Certificate;

$tml->licensed = "cb809";
$temp = $tml->readTokenCertificate();

if ($temp)
    $temp = $tml->delCertificate();

echo $temp;

?>