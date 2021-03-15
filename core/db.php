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

    public static function call()
    {
        return new DB;
    }

    public function query(string $query, array $bindings = null)
    {
        $state = $this->conn->prepare($query);

        # Handling error
        if (!$state->execute($bindings)) {
            echo '
                <div class="modal-container">
                    <div class="modal">
                        <div class="header">
                            <p class="title">#500 Что-то пошло не так</p>
                        </div>
                        <div class="body">
                            <p>Произошла ошибка на сервере:</p>
                            <p>
            ';

            var_dump($state->errorInfo());

            echo '
                            </p>
                        </div>
                        <div class="footer">
                            <a href="/" class="btn">Домой</a>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            ';

            die();
        }

        return $state;
    }

    public function rowCount(string $query, array $bindings = null)
    {
        $state = $this->query($query, $bindings);
        return $state->rowCount();
    }
}
