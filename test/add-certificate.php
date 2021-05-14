<?php

use Certificate\Models\Certificate;

require "vendor/autoload.php";

$tml = new Certificate;

$tml->name           = "Teste de Teste";
$tml->email          = "teste@teste.com";
$tml->testimonial_id = "2";

date_default_timezone_set('America/Sao_Paulo');
$tml->licensed  = substr(md5(date('l jS \of F Y h:i:s A')), 0, 5);
$tml->date_sign = date('Y-m-d');

$temp = $tml->addCertificate();

echo json_encode($temp);

?>