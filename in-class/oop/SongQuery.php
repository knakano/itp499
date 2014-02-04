<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/28/14
 * Time: 5:45 PM
 */

class SongQuery {

    protected $pdo;
    protected $sql;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->sql = "SELECT * FROM songs";
    }

    public function orderByTitle() {
        $this->sql = $this->sql . ' ORDER BY title';
    }

    public function all() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll();
    }

}

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$songQuery = new SongQuery($pdo);
$songQuery->orderByTitle();
$songs = $songQuery->all();

var_dump($songs);
