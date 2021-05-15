<?php

use Certificate\Models\Certificate;
use Certificate\Models\Testimonial;

require "../vendor/autoload.php";

$crt = new Certificate;

$crt->licensed = "7a87e";
$crtid = $crt->readTokenCertificate();

($crtid) or exit ( "No token found" );

$tml = new Testimonial;

$tml->id = $crtid["testimonial_id"];
$tmlid = $tml->readTokenTestimonial();

($tmlid) or exit ( "There's no event for this certificate" );

echo json_encode( "{$crtid['name']}'s {$tmlid['event']} certification is true" );

?>