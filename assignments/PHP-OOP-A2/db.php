<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/30/14
 * Time: 9:58 PM
 */

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);