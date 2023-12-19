<?php 

class DatabaseSingleton {
    private static $instance;
    private $connection;

    private function __construct() {
        $DBservername = "localhost";
        $DBusername = "root";
        $DBpasswordd = "";
        $DB = "purefitness";
        
        $this->connection = mysqli_connect($DBservername, $DBusername, $DBpasswordd, $DB);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function insertReview($userId, $reviewText) {
        $query = "INSERT INTO reviews (user_id, review_text) VALUES (?, ?)";
        $statement = $this->connection->prepare($query);
        
        if (!$statement) {
            die("Prepare failed: " . $this->connection->error);
        }
    
        $statement->bind_param("is", $userId, $reviewText);
    
        $result = $statement->execute();
    
        if (!$result) {
            die("Execute failed: " . $statement->error);
        }
    
        $statement->close();
    
        return $result;
    }
    
    
}

?>

