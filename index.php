<?php
/** RESTful web service
 * Allows RESTful access to database
 * 	Config file: phprestsql.ini
 */
require_once('phprestsql.php');
$PHPRestSQL = new PHPRestSQL();

//Limit access
if ($PHPRestSQL->method === 'GET' || $PHPRestSQL->method === 'HEAD') { $PHPRestSQL->exec(); }
else { $PHPRestSQL->methodNotAllowed(); }

/*---DEBUG---
echo '<pre>';
	var_dump($_SERVER['QUERY_STRING']);echo "<br />";
	var_dump($_GET);echo "<br />";
echo '</pre>';
-------------*/
?>