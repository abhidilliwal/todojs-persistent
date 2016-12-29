<?php

include_once 'BasicModel.php';

class MTodo extends BasicModel {

    function __construct(){
        parent::__construct();
    }


    function getById ($id) {

        $obj = null;

        $sql = 'select * from `todo` where `id`  = :id limit 1;';

        $statement = $this->db->prepare($sql);
        $statement->bindParam('id', $id, PDO::PARAM_INT);

        $statement->execute();

        if ($rows = $statement->fetch(PDO::FETCH_ASSOC)) {
            $obj = new Todo();
            foreach ($rows as $key => $value) {
                $obj->$key = $value;
            }
        }

        return $obj;
    }

    function getAll () {

        $list = array();

        $sql = 'select * from `todo`;';

        $statement = $this->db->prepare($sql);

        $statement->execute();

        while ($rows = $statement->fetch(PDO::FETCH_ASSOC)) {
            $obj = new Todo();
            foreach ($rows as $key => $value) {
                $obj->$key = $value;
            }
            array_push($list, $obj);
        }

        return $list;
    }

    function add (Todo $todo) {

        $sql = 'insert into `todo`
                (
                    `value`
                ) values
                (
                    :value
                )';

        $statement = $this->db->prepare($sql);
        $statement->bindParam('value', $todo->value, PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int) $this->db->lastInsertId();
        }

        return false;
    }

    function delete ($id) {

        $sql = 'delete from `todo`
        where id = :id
        limit 1';

        $statement = $this->db->prepare($sql);
        $statement->bindParam('id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

}

?>