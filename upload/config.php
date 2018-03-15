<?php
// HTTP
define('HTTP_SERVER', 'http://127.0.0.1/growelimpex/growelimpex/upload/');

// HTTPS
define('HTTPS_SERVER', 'http://127.0.0.1/growelimpex/growelimpex/upload/');

// DIR
define('DIR_APPLICATION', 'C:/wamp/www/growelimpex/growelimpex/upload/catalog/');
define('DIR_SYSTEM', 'C:/wamp/www/growelimpex/growelimpex/upload/system/');
define('DIR_IMAGE', 'C:/wamp/www/growelimpex/growelimpex/upload/image/');
define('DIR_STORAGE', 'C:/wamp/www/growelimpex/growelimpex/upload/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'gi');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');