<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/8/2017
 * Time: 4:47 AM
 */
use DetariAuth\Authentication\Database;
use DetariAuth\Authentication\Session;


//SESSION CONFIGURATION

define('SESSION_SECURE', true);

define('SESSION_HTTP_ONLY', true);

define('SESSION_REGENERATE_ID', true);

define('SESSION_USE_ONLY_COOKIES', 1);



$db = Database::getInstance();

Session::startSession();