<?php
require  "../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/8/2017
 * Time: 3:18 AM
 */
use DetariAuth\Authentication\SubmitFormsProcessors as Submit;

// csrf protection
if (empty ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) || strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) != 'xmlhttprequest')
    die ( "Sorry bro!" );

$url = parse_url ( isset ( $_SERVER ['HTTP_REFERER'] ) ? $_SERVER ['HTTP_REFERER'] : '' );
if (! isset ( $url ['host'] )) {
    die ( 'Sorry bro!' );
}

$allowedHosts = array (
    $url ['host'],
    "www." . $url ['host'],
    str_replace ( "www.", '', $url ['host'] )
);

if (! in_array ( $_SERVER ['SERVER_NAME'], $allowedHosts )) {
    die ( "Sorry bro!" );
}

$action = $_POST ['action'];

switch ($action) {

    case 'submitReg':
        $register = new Submit;
        echo $register->submit($_POST['username'],$_POST['password'],$_POST['email']);
        break;

    case 'submitFormFinal':
        $register = new Submit;
        echo $register->finalSubmit($_POST);

}