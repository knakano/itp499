<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/28/14
 * Time: 5:16 PM
 */

require_once 'Book.php';

$phpOOS = new Book('PHP Object Oriented Solutions', 300);
$jsGoodParts = new Book('JS Good Parts', 145);

//echo Book::$createdCount;

//echo $phpOOS->title;
//echo $phpOOS->pages;
//
//
//var_dump($phpOOS->isValid());
//
//echo $phpOOS;
//echo $phpOOS->listedAt;

echo Book::count();