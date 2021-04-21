<?php

define("lib", "../model/");

require_once lib."lib/Autoload.php"; // Remove if using a global autoloader
require_once lib."Certificate.php";
require_once lib."Testimonial.php";

// call certificate
$crt = new Certificate;

$crt->licensed = "7a87e";
$crtid = $crt->readTokenCertificate();

($crtid) or exit ( json_encode("No token found.") );

// call testimonial
$tml = new Testimonial;

$tml->id = $crtid["testimonial_id"];
$tmlid = $tml->readTokenTestimonial();

($tmlid) or exit ( json_encode("There's no event for this certificate.") );

// assemble complete certificate
echo json_encode( "{$crtid['name']}'s {$tmlid['event']} certification is true." );

?>