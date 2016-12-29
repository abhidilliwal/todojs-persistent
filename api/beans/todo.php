<?php

/**
 * Todo
 */
class Todo {
    public $id;
    public $value;

    function __construct($id = null, $value = null) {
        $this->id = $id;
        $this->value = $value;
    }

    function __set($name, $value) {
        switch ($name) {
            case 'id':
            $this->id = isset($value) ? (int)$value : null;
            break;
            case 'value':
            $this->value = isset($value) ? $value : null;
            break;

        }
    }
}
