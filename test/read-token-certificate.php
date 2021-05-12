<?php

define("lib", "../model/");

require_once lib."Lib/Autoload.php";
require_once lib."Certificate.php";
require_once lib."Testimonial.php";

$crt = new Certificate;

$crt->licensed = "7a87e";
$crtid = $crt->readTokenCertificate();

($crtid) or exit ( json_encode("No token found.") );

$tml = new Testimonial;

$tml->id = $crtid["testimonial_id"];
$tmlid = $tml->readTokenTestimonial();

($tmlid) or exit ( json_encode("There's no event for this certificate.") );

echo json_encode( "{$crtid['name']}'s {$tmlid['event']} certification is true." );

?>