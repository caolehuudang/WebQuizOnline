<?php 
      require_once ('../model/model.php');
      class controller {
        public $model;

        public function __construct()
        {
            $this->model = new model();
        }


        private function defaultAction(){

            $data = $this->model->getAllSubject();
            include ("../views/subjectAdmin.php");
        }


      }
?>