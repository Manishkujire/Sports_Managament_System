<?php

define( 'DIR', '' );
require_once DIR . 'config.php';

$control = new Controller();

$admin = new Admin();
$q = $admin->ret( 'select * from `player` order by `pid`' );
$i = 0;
if($q->rowcount()>0){
while( $row = $q->fetch( PDO::FETCH_ASSOC ) ) {
    $i++;
    $pid = $row[ 'pid' ];
    $p = substr( $pid, 1 );
    $p = intval( $p );
    if ( $i != $p ) {
        $pid = $i;
        $pid = 'P'.$pid;
        break;
    }
    $pid = 'P'.( $i+1 );
}}
else $pid="P1";
echo $pid;
?>