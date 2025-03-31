<?php

namespace Source\Core;

class Connect
{
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES urf8",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    private static $instance;

    public static function getInstance() : ?\PDO
    {
        if (empty(self::$instance)) {
            try {

            } catch (\PDOException $exception) {
                redirect("/ops/problemas");
            }
        }
        return self::$instance;
    }

    // Connect constructor
    final private function __construct()
    {
    }

    // Connect clone
    final protected function __clone()
    {
    }

}
