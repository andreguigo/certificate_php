<?php

define("lib", "../model/");

require_once lib."lib/Autoload.php"; // Remove if using a global autoloader
require_once lib."Testimonial.php";

$tml = new Testimonial;

$tml->event         = "Programing OO";
$tml->text          = "Program language OO in PHP - free!";
$tml->date_event    = "2021-04-23";
$tml->workload      = "80";

$temp = $tml->addTestimonial();

echo json_encode($temp);

?>