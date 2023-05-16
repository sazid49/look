<?php
/**
 * Created by PhpStorm.
 * User: Radd, Norrin
 * Date: 11/22/2022
 * Time: 5:00 PM
 */

use const lookon\lib\import\COMPANY_ID_STAGING_TABLE;

set_time_limit ( 0 );
ignore_user_abort ( 1 );
ini_set ( 'max_execution_time', 0 );
ini_set ( 'memory_limit', '1000M' );
error_reporting ( E_ALL );
ini_set ( 'default_socket_timeout', -1 );
ini_set ( 'mysqlnd.net_read_timeout', -1 );

$DB_HOST = "mysql:host=".env('DB_HOST').";port=".env('DB_PORT').";dbname=env(".env('DB_DATABASE').")";
$DB_USER = env('DB_USERNAME');
$DB_PASS = env('DB_PASSWORD');

$DB_OPT = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$db_object = new PDO( $DB_HOST,$DB_USER,$DB_PASS, $DB_OPT ) ;

$uids_to_prune_sql = "SELECT uid from company_test where created_at > DATE_SUB(NOW(), INTERVAL 5 DAY);";

$uids_to_prune = '"'. implode( '","' , $db_object->query ( $uids_to_prune_sql )->fetchAll ( PDO::FETCH_COLUMN ) ) . '"';

$drop_company_id_staging_rows_sql = "DELETE from company_id_staging_test where company_uid in ( $uids_to_prune )";
echo $db_object->query($drop_company_id_staging_rows_sql)->execute ();

$drop_company_rows_sql = "DELETE from company_test where uid in ( $uids_to_prune )";
echo $db_object->query($drop_company_rows_sql)->execute ();

exit();
