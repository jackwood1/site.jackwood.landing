<?php

/*
	This is the main include file.
	It is only used in index.php and keeps it much cleaner.
*/

require_once "includes/config.php";
require_once "includes/connect.php";
require_once "includes/helpers.php";
require_once "includes/models/product.model.php";
require_once "includes/models/category.model.php";
require_once "includes/models/grade.model.php";
require_once "includes/models/country.model.php";
require_once "includes/controllers/home.controller.php";
require_once "includes/controllers/category.controller.php";
require_once "includes/controllers/grade.controller.php";
require_once "includes/controllers/country.controller.php";

// Setup global logging
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/site.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('My logger is now ready');

// This will allow the browser to cache the pages of the store.

header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");

?>
