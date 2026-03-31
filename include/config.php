<?php

// SITE_ROOT contains the full path to the tshirtshop folder
define('SITE_ROOT', dirname(dirname(__FILE__)));

define('HTTP_SERVER_PORT', '80');

define('VIRTUAL_LOCATION', '/explore/');

// Application directories
define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
define('BUSINESS_DIR', SITE_ROOT . '/business/');
// Settings needed to configure the Smarty template engine
define('SMARTY_DIR', SITE_ROOT . '/libs/smarty/');
define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');
define('COMPILE_DIR', PRESENTATION_DIR . 'templates_c');
define('CONFIG_DIR', SITE_ROOT . '/include/configs');
define('PRODUCTS_PER_PAGE', 4);

// Database connectivity setup
define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Twigytech123@');
define('DB_DATABASE', 'zarc');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);
?>
