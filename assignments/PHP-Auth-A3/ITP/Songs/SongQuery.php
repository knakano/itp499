<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 11:38 AM
 */

namespace ITP\Songs;

class SongQuery {

    protected $pdo;
    protected $sql;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->sql = "SELECT title, price, artist_name, genre FROM songs ";
    }

    public function withArtist() {
        $this->sql = $this->sql . "INNER JOIN artists ON songs.artist_id = artists.id ";
        return $this;
    }

    public function withGenre() {
        $this->sql = $this->sql . "INNER JOIN genres ON songs.genre_id = genres.id ";
        return $this;
    }

    public function orderBy($variable) {
        $this->sql = $this->sql . "ORDER BY $variable";
        return $this;
    }

    public function all() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}