<?php 
    class subject {
        public $id_subject;
        public $subject_name;
        public $description;
    

    public function __construct($id_subject,$subject_name,$description){
        $this-> id_subject = $id_subject;
        $this-> subject_name = $subject_name;
        $this-> description = $description;
    }
}
?>