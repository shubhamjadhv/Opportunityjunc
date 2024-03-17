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
require_once( "config.php");
require_once("function.php");
require_once("session.php");
require_once("accounts.php");
require_once("autonumbers.php");
require_once("companies.php");
require_once("job.php");
require_once("employees.php");
require_once("categories.php");
require_once("applicants.php");
require_once("jobregistration.php");

require_once("database.php");
?>
