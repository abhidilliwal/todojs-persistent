<?php

include_once 'ConnectionManager.php';

class BasicModel {

    /**
     *
     * @var PDO
     */
    protected $db;

    function __construct() {
        $this->db = ConnectionManager::getConnection();
    }

    function beginTransaction() {
        return $this->db->beginTransaction();
    }

    function commit() {
        return $this->db->commit();
    }

    function rollback() {
        return $this->db->rollback();
    }

}

?>