<?php

use Certificate\Models\Testimonial;

require "vendor/autoload.php";

$tml = new Testimonial;

$tml->event         = "Programing OO";
$tml->text          = "Program language OO in PHP - free!";
$tml->date_event    = "2021-04-23";
$tml->workload      = "80";

$temp = $tml->addTestimonial();

echo json_encode($temp);

?>