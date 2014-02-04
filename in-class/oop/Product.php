<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/28/14
 * Time: 5:25 PM
 */

class Product {

    public $title;
    public $price;

    /* __ = magic method */
    public function __construct($title = 'NA') {
        $this->title = $title;
    }

    public function __toString() {
        return $this->title;
    }

    public function isValid() {
        if($this->title) {
            return true;
        }

        return false;
    }

}