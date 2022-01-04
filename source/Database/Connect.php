<?php

namespace Source\Database;

use \PDO;
use \PDOException;

/**
 * Class Connect
 */
class Connect
{
     /** @var PDO */
    private static $instance;

    /** @var PDOException */
    private static $error;
    
    /**
     * getInstance
     *
     * @return PDO
     */
    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    DATABASE['driver'].":host=".DATABASE['host'].";dbname=".DATABASE['dbname'].";port=".DATABASE['port'],
                    DATABASE['username'],
                    DATABASE['passwd'],
                    DATABASE['options']
                );
            } catch (PDOException $exception) {
                self::$error = $exception;
            }
        }
        return self::$instance;
    }
    
    /**
     * getError
     *
     * @return PDOException
     */
    public static function getError(): ?PDOException
    {
        return self::$error;
    }
    
    /**
     * __construct
     *
     * @return void
     */
    final private function __construct()
    {

    }
    
    /**
     * __clone
     *
     * @return void
     */
    final private function __clone()
    {

    }


}
