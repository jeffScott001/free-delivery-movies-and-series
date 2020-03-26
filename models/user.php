<?php
    class User {
        private $conn;
        private $table = 'users';

        public $id;
        public $fName;
        public $lName;
        public $email;
        public $phoneNumber;
        public $password;
        public $town;
        public $street;
        public $building;

        // constructor with db
        public function __construct($db) {
            $this->conn = $db;
        }

        // Check if user exist
        public function checkEmail() {
            // query
            $query = 'SELECT * FROM '
                . $this->table . 
                ' WHERE email = :email';

                // Prepare statements
                $stmt = $this->conn->prepare($query);

                // clean the data
                $this->email = htmlspecialchars(strip_tags($this->email));

                // Bind data
                $stmt->bindParam(':email', $this->email);

                // Execute
                $stmt->execute();

              
                 if($stmt->rowCount() > 0) {
                     return true;
                 } else {
                     return false;
                 }

        }

        // Register user
        public function register() {
            // query
            $query = 'INSERT INTO ' 
                . $this->table . 
                ' SET 
                    fName = :fName,
                    lName = :lName,
                    email = :email,
                    phoneNumber = :phoneNumber,
                    password = :password,
                    town = :town,
                    street = :street,
                    building = :building';

            // Prepare statements
            $stmt = $this->conn->prepare($query);

          
            

            // Clean the data
            $this->fName = htmlspecialchars(strip_tags($this->fName));
            $this->lName = htmlspecialchars(strip_tags($this->lName));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->town = htmlspecialchars(strip_tags($this->town));
            $this->street = htmlspecialchars(strip_tags($this->street));
            $this->building = htmlspecialchars(strip_tags($this->building));
            // Bind data
            $stmt->bindParam(':fName', $this->fName);
            $stmt->bindParam(':lName', $this->lName);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phoneNumber', $this->phoneNumber);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':town', $this->town);
            $stmt->bindParam(':street', $this->street);
            $stmt->bindParam(':building', $this->building);
            
            // Execute
            if($stmt->execute()) {
                return true;
            } else {
                // error
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }

        // Log in user
        function logIn() {
            $query = 'SELECT * FROM '
                . $this->table . 
                ' WHERE email=:email';

            // Prepare statements
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->email = htmlspecialchars(strip_tags($this->email));

            // Bind params
            $stmt->bindParam(':email', $this->email);

            $stmt->execute();
            return $stmt;
        }
    }