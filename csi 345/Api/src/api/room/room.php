<?php
//echo "hi";
class Room{
    // db section
    private $db;

    // Table
    private $db_table = "Room";
// Columns
    public $RoomID;
    public $status;

    // Db dbection
    public function __construct($db){
        $this->db = $db;
    }

    //read
    public function getRooms(){
        $sqlQuery = "SELECT RoomID, status status FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        //var_dump($this->result);
        return $this->result;
    }

    // CREATE
        public function createRoom2(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    RoomID = :RoomID,
                    status = :status";
                //print_r($sqlQuery);
            $stmt = $this->db->prepare($sqlQuery);

            // sanitize
            $this->RoomID=htmlspecialchars(strip_tags($this->RoomID));
            $this->status=htmlspecialchars(strip_tags($this->status));

            // bind data
            $stmt->bindParam(":RoomID", $this->RoomID);
            $stmt->bindParam(":status", $this->status);

             if($stmt->execute()){
                 return true;
             }
                return false;
         }
}

    //Update
        public function updateRoom(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        status = :status
                    WHERE
                        RoomID = :RoomID";
            //var_dump($sqlQuery);
            $stmt = $this->db->prepare($sqlQuery);

            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->RoomID=htmlspecialchars(strip_tags($this->RoomID));
            // bind data
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":RoomID", $this->RoomID);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // DELETE
        public function deleteRoom(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE RoomID = ?";
            $stmt = $this->db->prepare($sqlQuery);

            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(1, $this->RoomID);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

}
