<?php


class Database
{
    protected static $instance;

    protected $dsn = 'mysql:host=localhost;dbname=tasks';
    protected $username = 'root';
    protected $password = '';
    public $pdo;


    public function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function __construct()
    {
        $pdo = new PDO($this->dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }
    public function getConnection()
    {
        return $this->pdo;
    }

}