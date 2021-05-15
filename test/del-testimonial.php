<?php

use Certificate\Models\Testimonial;

require "../vendor/autoload.php";

$tml = new Testimonial;

$tml->id = "10";
$temp = $tml->readTokenTestimonial();

if ($temp)
    $temp = $tml->delTestimonial();

echo $temp;

?>