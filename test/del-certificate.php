<?php

use Certificate\Models\Certificate;

require "vendor/autoload.php";

$tml = new Certificate;

$tml->licensed = "208f2";
$temp = $tml->readTokenCertificate();

if ($temp)
    $temp = $tml->delCertificate();

echo json_encode($temp);

?>