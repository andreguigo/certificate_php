<?php

define("lib", "../model/");

require_once lib."lib/Autoload.php"; // Remove if using a global autoloader
require_once lib."Testimonial.php";

$tml = new Testimonial;
$temp = $tml->readTestimonial();

echo json_encode($temp);

?>