<?php

define("lib", "../model/");

require_once lib."Lib/Autoload.php";
require_once lib."Certificate.php";

$crt = new Certificate;
$temp = $crt->readCertificate();

($temp) or exit( json_encode( array("message" => "No certificates found.") ) );

echo json_encode($temp);

?>