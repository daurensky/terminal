<?php

require_once 'config.php';

class DB
{
    private $conn;

    public function __construct()
    {
        $host = config('DB_HOST');
        $user = config('DB_USER');
        $password = config('DB_PASSWORD');
        $name = config('DB_NAME');

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$name", $user, $password);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query(string $query, array $bindings = null)
    {
        $state = $this->conn->prepare($query);

        foreach ($bindings as $bindingKey => $binding) {
            $state->bindParam($bindingKey, $binding);
        }

        return $state;
    }
}
