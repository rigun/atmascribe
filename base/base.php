<?php
define('BASE_URL', 'http://localhost:808/paw/Tubes/');
define('BASE_PATH', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);

function layout($string) {
	global $vTitle;
	require(BASE_PATH.$string);
}

?>