<?php
// This is an autoloader for the crud-pdo! SDK.
// If you are not using a global autoloader do the following
// before any other crud-pdo files:
// 
// require_once "<path>/Autoload.php"

function certificateAutoload($classname) {
	require $classname.".php";
}

spl_autoload_register("certificateAutoload");