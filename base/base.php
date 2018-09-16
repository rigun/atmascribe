<?php
define('BASE_URL', 'https://atmascribe.thekingcorp.org/');
define('BASE_PATH', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);

function layout($string) {
	global $vTitle;
	require(BASE_PATH.$string);
}

?>