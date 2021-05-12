<?php

function certificateAutoload($classname) {
	require $classname.".php";
}

spl_autoload_register("certificateAutoload");