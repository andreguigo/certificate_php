<?php

use Certificate\Models\Testimonial;

require "vendor/autoload.php";

$tml = new Testimonial;
$temp = $tml->readTestimonial();

echo json_encode($temp);

?>