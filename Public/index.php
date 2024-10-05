<?php

declare ( strict_types = 1 );

use Handler;

ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );

if ( false === defined ( 'FALSE' ) )   define ( 'FALSE',   false );
if ( FALSE === defined ( 'TRUE' ) )    define ( 'TRUE',    true );
if ( FALSE === defined ( 'NULL' ) )    define ( 'NULL',    null );
if ( FALSE === defined ( 'DS' ) )      define ( 'DS',      DIRECTORY_SEPARATOR );
if ( FALSE === defined ( 'NEWLINE' ) ) define ( 'NEWLINE', '\n' );
if ( FALSE === defined ( 'TAB' ) )     define ( 'TAB',     '\t' );
if ( FALSE === defined ( 'RETURN' ) )  define ( 'RETURN',  '\r' );
if ( FALSE === defined ( 'ROOT' ) )    define ( 'ROOT',    dirname ( __DIR__ )  );
if ( FALSE === defined ( 'TIME' ) )    define ( 'TIME',    microtime ( true )  );
if ( FALSE === defined ( 'SRC' ) )     define ( 'SRC',     ROOT . DS . 'src' );
if ( FALSE === defined ( 'PHP' ) )     define ( 'PHP',     ".php" );

spl_autoload_register (
    function ( string $class ): void
    {
        $file = ROOT . DS . str_replace ( '\\', DS, $class ) . PHP;
        if ( TRUE === @ file_exists ( $file ) ) require_once $file;
    },
    TRUE,
    TRUE,
);

( new Handler () ) -> handle ();

