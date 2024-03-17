<?php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP Pre-defined constant:
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Define SITE_ROOT if not already defined
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'Opportunityjunc');

// Define LIB_PATH if not already defined
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'include');

// Load the database configuration first.
require_once(LIB_PATH . DS . "config.php");
require_once(LIB_PATH . DS . "function.php");
require_once(LIB_PATH . DS . "session.php");
require_once(LIB_PATH . DS . "accounts.php");
require_once(LIB_PATH . DS . "autonumbers.php");
require_once(LIB_PATH . DS . "companies.php");
require_once(LIB_PATH . DS . "job.php");
require_once(LIB_PATH . DS . "employees.php");
require_once(LIB_PATH . DS . "categories.php");
require_once(LIB_PATH . DS . "applicant.php");
require_once(LIB_PATH . DS . "jobregistration.php");

require_once(LIB_PATH . DS . "database.php");
?>
