<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/28/14
 * Time: 5:25 PM
 */

class Song {

    protected $pdo;
    protected $sql;
    protected $statement;

    public $title;
    public $artistId;
    public $genreId;
    public $price;
    public $lastInsertId;

    /* __ = magic method */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setArtistId($artistId) {
        $this->artistId = $artistId;
    }

    public function setGenreId($genreId) {
        $this->genreId = $genreId;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function save() {

        $this->sql = "INSERT INTO songs (title, artist_id, genre_id, price) VALUES ('".
            // $this->lastInsertId . "','" .
            $this->title . "','" .
            $this->artistId . "','" .
            $this->genreId . "','" .
            $this->price . "')";
        $this->statement = $this->pdo->prepare($this->sql);
        $success = $this->statement->execute();
        return $success;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getId() {
        $this->lastInsertId = $this->pdo->lastInsertId();
        return $this->lastInsertId;
    }

}