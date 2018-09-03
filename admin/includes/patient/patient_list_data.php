<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );


// DB table to use

$table = $wpdb->prefix . 'users';

// Table's primary key
$primaryKey = 'ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes + the primary key column for the id
$columns = array(
	array(
		'db' => 'ID',
		'dt' => 'DT_RowId',
		'formatter' => function( $d, $row ) {
			// Technically a DOM id cannot start with an integer, so we prefix
			// a string. This can also be useful if you have multiple tables
			// to ensure that the id is unique with a different prefix
			return 'row_'.$d;
		}
	),
	array( 'db' => 'ID', 'dt' => 0 ),
	array( 'db' => 'user_login', 'dt' => 1 ),
	array( 'db' => 'display_name',  'dt' => 2 ),
	array( 'db' => 'user_email',  'dt' => 3),
	array( 'db' => 'ID',  'dt' => 4 ),
	array( 'db' => 'ID',   'dt' => 5)

);
//echo $userimage=get_user_meta(90, 'hmgt_user_avatar', true);
//exit;
$table_usermeta = $wpdb->prefix . 'usermeta';
// SQL server connection information
$sql_details = array(
	'user' => DB_USER,
	'pass' => DB_PASSWORD,
	'db'   => DB_NAME,
	'host' => DB_HOST
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'patient_load_class.php' );

echo json_encode(
	SSP_Patient::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

