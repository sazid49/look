<?php
if (file_exists('/usr/home/lookonat/public_html/import_shab/vendor/autoload.php')) {
    require_once('/usr/home/lookonat/public_html/import_shab/vendor/autoload.php');
}
set_time_limit(0);
ignore_user_abort(1);
ini_set('max_execution_time', 0);
ini_set('memory_limit','1000M');
error_reporting(E_ALL);
ini_set('default_socket_timeout',-1);
ini_set('mysqlnd.net_read_timeout', -1);


$dotenv = Dotenv\Dotenv::createImmutable("/usr/home/lookonat/public_html");
$dotenv->load();
//$dotenv->safeLoad();

use lookon\lib\import\PublicationDiscoveryService;

require_once('lib/RestSDK.php');
require_once('services/PublicationDiscoveryService.php');

$DB_HOST = "mysql:host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_DATABASE'];
$DB_USER = $_ENV['DB_USERNAME'];
$DB_PASS = $_ENV['DB_PASSWORD'];

$DB_OPT = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$db_object = new PDO( $DB_HOST,$DB_USER,$DB_PASS, $DB_OPT ) ;

$PublicationDiscoveryService = new PublicationDiscoveryService( $db_object );

try {
    $PublicationDiscoveryService->discover ();
} catch ( Exception $e ) {
    var_export($e);
}
