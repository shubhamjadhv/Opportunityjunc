<?php
defined('server') ? null : define("server", "apache.mysql.database.azure.com");
defined('user') ? null : define ("user", "shubham") ;
defined('pass') ? null : define("pass","Admin123");
defined('database_name') ? null : define("database_name", "erisdb") ;

$this_file = str_replace('\\', '/', __FILE__); // Corrected __FILE__

$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root = str_replace(array($doc_root, "include/config.php"), '', $this_file);
$server_root = str_replace("config/config.php", '', $this_file);

define('web_root', $web_root); // Changed web_root to WEB_ROOT
define('SERVER_ROOT', $server_root); // Changed server_root to SERVER_ROOT

?>