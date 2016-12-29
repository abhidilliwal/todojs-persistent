<?php

include_once 'beans/todo.php';
include_once 'dao/MTodo.php';

function getAllTodo () {
    $mtodo = new MTodo();
    return $mtodo->getAll();
}

function getTodoById($id) {
    $mtodo = new MTodo();
    return $mtodo->getById($id);
}


$paramId = $_GET['id'];
$response = null;

if (isset($paramId) && is_numeric($paramId) && (int)$paramId > 0) {
    $response_obj = getTodoById((int)$paramId);
} else {
    $response_obj = getAllTodo();
}

header('Content-Type: application/json');
if ($response_obj) {
    echo json_encode($response_obj);
} else {
    echo '';
}
