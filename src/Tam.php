<?php
    class Tam {
        private $name;
        private $food;
        private $attention;
        private $rest;

        function __construct($name, $food = 5, $attention = 5, $rest = 5) {
            $this->name = (string)$name;
            $this->food = (integer)$food;
            $this->attention = (integer)$attention;
            $this->rest = (integer)$rest;
        }

        // Getters and Setts
        function getName() {
            return $this->name;
        }

        function getFood() {
            return $this->food;
        }

        function setFood($num) {
            $this->food += (integer)$num;
        }

        function getAttention() {
            return $this->attention;
        }

        function setAttention($num) {
            $this->attention += (integer)$num;
        }

        function getRest() {
            return $this->rest;
        }

        function setRest($num) {
            $this->rest += (integer)$num;
        }

        function save() {
            $_SESSION['tam'] = $this;
        }

        function timeElapsed($hours) {
            $this->food -= $hours;
            $this->attention -= $hours;
            $this->rest -= $hours;
        } 

        function getImg() {
            if ($this->food > 5 && $this->attention > 5 && $this.rest > 5) {
                return "";
            }
        }

        static function deleteTam() {
            $_SESSION['tam'] = array();
        }
    }