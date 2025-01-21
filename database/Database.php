<?php

class Database {
    private $host = "localhost";
    private $dbname = "youdemy";
    private $username = "root";
    private $password = "";
    private $connection;
    private $lastQuery;

    public function __construct() {
        // Établir une connexion à MySQL sans spécifier la base de données
        try {
            $dsn = "mysql:host={$this->host};charset=utf8mb4";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si la base de données existe
            $result = $this->connection->query("SHOW DATABASES LIKE '{$this->dbname}'");
            if ($result->rowCount() == 0) {
                // Exécuter le fichier init.sql pour créer les tables
                $filePath = __DIR__ . '/init.sql';
                $sql = file_get_contents($filePath);
                $this->connection->exec($sql);
            } else {
                // Utiliser la base de données existante
                $this->connection->exec("USE {$this->dbname}");

            }
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        try {
            $this->lastQuery = ['sql' => $sql, 'params' => $params];
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function getLastQuery() {
        return $this->lastQuery;
    }

    public function select($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastInsertedId() {
        return (int)$this->connection->lastInsertId();
    }

}