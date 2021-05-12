<?php

define("lib", "../model/");

require_once lib."Lib/Autoload.php";
require_once lib."Testimonial.php";

$tml = new Testimonial;
$temp = $tml->readTestimonial();

echo json_encode($temp);

?>