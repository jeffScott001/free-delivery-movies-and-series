<?php
    class ITEM {
        private $conn;
        private $table = 'ordered_items';

        public $item_id;
        public $user_id;
        public $phone_number;
        public $area;
        public $item_name;
        public $seasons;
        public $episodes;
        public $price;
        public $paid;
        public $deliverd;
        public $date_delivered;
        public $mpesa_code;

        // constructor with db
        public function __construct($db) {
            $this->conn = $db;
        }



        // Register user
        public function orderedItems() {
            // query
            $query = 'INSERT INTO ' 
                . $this->table . 
                ' SET 
                    user_id = :user_id,
                    phone_number = :phone_number,
                    area = :area,
                    item_name = :item_name,
                    seasons = :seasons,
                    episodes = :episodes,
                    mpesa_code = :mpesa_code,
                    price = :price';

            // Prepare statements
            $stmt = $this->conn->prepare($query);

            // Clean the data
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
            $this->area = htmlspecialchars(strip_tags($this->area));
            $this->item_name = htmlspecialchars(strip_tags($this->item_name));
            $this->seasons = htmlspecialchars(strip_tags($this->seasons));
            $this->episodes = htmlspecialchars(strip_tags($this->episodes));
            $this->mpesa_code = htmlspecialchars(strip_tags($this->mpesa_code));
            $this->price = htmlspecialchars(strip_tags($this->price));
            // Bind data
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':phone_number', $this->phone_number);
            $stmt->bindParam(':area', $this->area);
            $stmt->bindParam(':item_name', $this->item_name);
            $stmt->bindParam(':seasons', $this->seasons);
            $stmt->bindParam(':episodes', $this->episodes);
            $stmt->bindParam(':mpesa_code', $this->mpesa_code);
            $stmt->bindParam(':price', $this->price);
            
            // Execute
            if($stmt->execute()) {
                return true;
            } else {
                // error
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }
    }