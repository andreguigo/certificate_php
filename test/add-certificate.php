<?php

define("lib", "../model/");

require_once lib."lib/Autoload.php"; // Remove if using a global autoloader
require_once lib."Certificate.php";

$tml = new Certificate;

$tml->name           = "Teste de Teste";
$tml->email          = "teste@teste.com";
$tml->testimonial_id = "2";

// recommended not to modify
date_default_timezone_set('America/Sao_Paulo');
$tml->licensed  = substr(md5(date('l jS \of F Y h:i:s A')), 0, 5);
$tml->date_sign = date('Y-m-d');

$temp = $tml->addCertificate();

echo json_encode($temp);

?>