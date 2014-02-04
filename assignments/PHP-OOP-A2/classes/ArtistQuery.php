<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/30/14
 * Time: 10:01 PM
 */

 class ArtistQuery {

    protected $pdo;
    protected $sql;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->sql = "SELECT * FROM artists";
    }

    public function getAll() {
        $statement = $this->pdo->prepare($this->sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

 }