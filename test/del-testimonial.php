<?php

define("lib", "../model/");

require_once lib."Lib/Autoload.php";
require_once lib."Testimonial.php";

$tml = new Testimonial;

$tml->id = "10";
$temp = $tml->readTokenTestimonial();

if ($temp)
    $temp = $tml->delTestimonial();

echo json_encode($temp);

?>