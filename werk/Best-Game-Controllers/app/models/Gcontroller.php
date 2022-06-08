<?php



    class GController
    {
        public function __construct()
        {
            $this->db = new Database();
        }

        //hier halen en schrijven we de informatie uit de database
        public function GController()
        {
            $this->db->query('SELECT * FROM `gcontrollers`');

            $result = $this->db->resultSet();

            return $result;
        }
        //Dit is waar we een unieke gamecontroller uit de database kunnen hallen doormiddel van de primary id
        public function getSingleGC($id)
        {
            $this->db->query('SELECT * FROM `gcontrollers` WHERE `id` = :id');
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            return  $this->db->single();
        }

        public function deleteGC($id = NULL)
        {
            $this->db->query('DELETE FROM gcontrollers WHERE id = :id');
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            return $this->db->execute();
        }
        //hier worden de data, gekregen van de controller naar de database geschreven.
        public function createGC($post)
        {

            $this->db->query("INSERT INTO gcontrollers (id, name, brand, price, partyType) VALUES (:id, :name, :brand, :price, :partyType)");

            $this->db->bind(':id', NULL, PDO::PARAM_INT);
            $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
            $this->db->bind(':brand', $post["brand"], PDO::PARAM_STR);
            $this->db->bind(':price', $post["price"], PDO::PARAM_INT);
            $this->db->bind(':partyType', $post["partyType"], PDO::PARAM_STR);

            return $this->db->execute();
        }
    }
?>