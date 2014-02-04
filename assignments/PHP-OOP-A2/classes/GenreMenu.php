<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 1/30/14
 * Time: 10:01 PM
 */

class GenreMenu {

    protected $pdo;
    protected $sql;
    public $name;
    public $options;
    public $string;

    public function __construct($name, $options) {
        $this->name = $name;
        $this->options = $options;
        $this->string = '<select name = "'. $this->name . '">';
    }

    public function __toString() {
        foreach($this->options as $option) :
            $this->string = $this->string . '<option value = "' . $option->id . '">' . $option->genre . '</option>';
        endforeach;
        $this->string = $this->string . '</select>';
        return $this->string;
    }

}