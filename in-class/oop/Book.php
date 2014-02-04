<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/28/14
 * Time: 5:15 PM
 */

require_once 'Product.php';


class Book extends Product {

    // public, protected, private
    public $pages;
    public $authors;
    protected $listedAt;

    protected static $createdCount = 0; // static = shared variables across all instances

    public function __construct($title, $pages) {
        static::$createdCount++; // or self::$createdCount++
        $this->pages = $pages;
        $this->listedAt = time();
        parent::__construct($title); // scope resolution keyword ::
    }

    public static function count() { // static method
        return static::$createdCount;
    }
}