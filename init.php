<?php
include_once( './lib/cls_MySQL.php' );
include_once( './lib/smarty/Smarty.class.php');

$db = new MySQL( $config );
$redis = new Redis();
$redis->connect( '127.0.0.1', 6379 );

$smarty = new Smarty();