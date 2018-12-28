<?php 
     require_once ('../Config/db.php');
     require_once ('subject.php');

     class model {

        private $conn;

        public function __construct()
        {
            $this->conn = getConnection();
        }


        public function getAllSubject(){

            try{

                $data = array();

                $sql = "select * from $subject";
                $result = $this->conn->query($sql);

                while ($row = $result->fetch_assoc()){

                    $id_subject = $row['id_subject'];
                    $subject_name = $row['subject_name'];
                    $description = $row['description'];
                  

                    $subject = new subject($id_subject,$subject_name,$description);
                     $data[$id] = $subject;

                }

                return $data;
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
     }
?>