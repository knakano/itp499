<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/4/14
 * Time: 5:11 PM
 */

namespace Yelp\Reviews; // VendorName\PackageName
use DateTime;


class Review {

    protected $createdAt;
    public function __construct() {
        $date = new DateTime();
        $this->createdAt = $date->format('m-d-YY');
    }

}