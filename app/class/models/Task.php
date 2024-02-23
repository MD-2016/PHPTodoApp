<?php

    namespace MD\models;
    use MD\models\Model;

    class Task
    {
        protected $coreModel;
        public $description;
        protected $done;

        public function isDone() {
            return $this->done;
        }

        public function done() {
            $this->done = true;
        }

        public function list_tasks($user) {
            $coreModel = new Model;
            $coreModel->__construct();
            $sql = "SELECT * FROM `tasks` WHERE `userid={$user}`";
            $stmt
        }
    }