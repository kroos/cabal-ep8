<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mssql.  Currently supported:
				 mssql, mssqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For mssql and mssqli databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or mssql < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mssql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'ACCOUNT';
$active_record = TRUE;

$db['ACCOUNT']['hostname'] = '127.0.0.1';
$db['ACCOUNT']['username'] = 'sa';
$db['ACCOUNT']['password'] = '123123';
$db['ACCOUNT']['database'] = 'Account';
$db['ACCOUNT']['dbdriver'] = 'mssql';
$db['ACCOUNT']['dbprefix'] = '';
$db['ACCOUNT']['pconnect'] = FALSE;
$db['ACCOUNT']['db_debug'] = TRUE;
$db['ACCOUNT']['cache_on'] = FALSE;
$db['ACCOUNT']['cachedir'] = '';
$db['ACCOUNT']['char_set'] = 'utf8';
$db['ACCOUNT']['dbcollat'] = 'utf8_general_ci';
$db['ACCOUNT']['swap_pre'] = '';
$db['ACCOUNT']['autoinit'] = TRUE;
$db['ACCOUNT']['stricton'] = FALSE;

$db['SERVER01']['hostname'] = '127.0.0.1';
$db['SERVER01']['username'] = 'sa';
$db['SERVER01']['password'] = '123123';
$db['SERVER01']['database'] = 'Server01';
$db['SERVER01']['dbdriver'] = 'mssql';
$db['SERVER01']['dbprefix'] = '';
$db['SERVER01']['pconnect'] = FALSE;
$db['SERVER01']['db_debug'] = TRUE;
$db['SERVER01']['cache_on'] = FALSE;
$db['SERVER01']['cachedir'] = '';
$db['SERVER01']['char_set'] = 'utf8';
$db['SERVER01']['dbcollat'] = 'utf8_general_ci';
$db['SERVER01']['swap_pre'] = '';
$db['SERVER01']['autoinit'] = TRUE;
$db['SERVER01']['stricton'] = FALSE;

$db['CASHSHOP']['hostname'] = '127.0.0.1';
$db['CASHSHOP']['username'] = 'sa';
$db['CASHSHOP']['password'] = '123123';
$db['CASHSHOP']['database'] = 'CashShop';
$db['CASHSHOP']['dbdriver'] = 'mssql';
$db['CASHSHOP']['dbprefix'] = '';
$db['CASHSHOP']['pconnect'] = FALSE;
$db['CASHSHOP']['db_debug'] = TRUE;
$db['CASHSHOP']['cache_on'] = FALSE;
$db['CASHSHOP']['cachedir'] = '';
$db['CASHSHOP']['char_set'] = 'utf8';
$db['CASHSHOP']['dbcollat'] = 'utf8_general_ci';
$db['CASHSHOP']['swap_pre'] = '';
$db['CASHSHOP']['autoinit'] = TRUE;
$db['CASHSHOP']['stricton'] = FALSE;

$db['CABALCASH']['hostname'] = '127.0.0.1';
$db['CABALCASH']['username'] = 'sa';
$db['CABALCASH']['password'] = '123123';
$db['CABALCASH']['database'] = 'CabalCash';
$db['CABALCASH']['dbdriver'] = 'mssql';
$db['CABALCASH']['dbprefix'] = '';
$db['CABALCASH']['pconnect'] = FALSE;
$db['CABALCASH']['db_debug'] = TRUE;
$db['CABALCASH']['cache_on'] = FALSE;
$db['CABALCASH']['cachedir'] = '';
$db['CABALCASH']['char_set'] = 'utf8';
$db['CABALCASH']['dbcollat'] = 'utf8_general_ci';
$db['CABALCASH']['swap_pre'] = '';
$db['CABALCASH']['autoinit'] = TRUE;
$db['CABALCASH']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */