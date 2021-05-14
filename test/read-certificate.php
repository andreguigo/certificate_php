<?php

use Certificate\Models\Certificate;

require "vendor/autoload.php";

$crt = new Certificate;
$temp = $crt->readCertificate();

($temp) or exit( json_encode( array("message" => "No certificates found.") ) );

echo json_encode($temp);

?>