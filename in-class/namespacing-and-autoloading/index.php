<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/4/14
 * Time: 5:11 PM
 */

//require_once __DIR__ . '/Yelp/Review.php';
//require_once __DIR__ . '/OpenTable/Review.php';
//
//function __autoload($class) {
//
//}

//spl_autoload_register(function($class) {
//    var_dump($class);
//});
//
//spl_autoload_register(function($class) {
//    var_dump($class);
//});

require __DIR__ . '/vendor/autoload.php';
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

use \Yelp\Reviews\Review as YelpReview;
use \OpenTable\Reviews\Review as OpenTableReview;


$billing = new Hunger\Billing\Paypal();

$review1 = new YelpReview();
$review2 = new OpenTableReview();

