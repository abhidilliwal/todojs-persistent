<?php

class ConnectionManager {

    static $pdo = null;

    /**
     * @return PDO
     */
    public static function getConnection () {
        if (ConnectionManager::$pdo == null) {

            include_once '_config.php';
            $dsn = $db['dsn'];
            $username = $db['username'];
            $password = $db['password'];
            $pconnect = $db['pconnect'];

            ConnectionManager::$pdo = new PDO($dsn, $username, $password, array(
                    PDO::ATTR_PERSISTENT => $pconnect
            ));
            ConnectionManager::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ConnectionManager::$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);

        }
        return ConnectionManager::$pdo;
    }

}

?>