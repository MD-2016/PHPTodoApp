<?php

    namespace models;

    class Task
    {
        public $description;
        protected $done;

        public function isDone() {
            return $this->done;
        }

        public function done() {
            $this->done = true;
        }
    }