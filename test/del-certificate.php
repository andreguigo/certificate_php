<?php

define("lib", "../model/");

require_once lib."Lib/Autoload.php";
require_once lib."Certificate.php";

$tml = new Certificate;

$tml->licensed = "208f2";
$temp = $tml->readTokenCertificate();

if ($temp)
    $temp = $tml->delCertificate();

echo json_encode($temp);

?>