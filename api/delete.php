<?php

include_once 'beans/todo.php';
include_once 'dao/MTodo.php';

function delete($id) {
    $mtodo = new MTodo();
    $mtodo->delete($id);
}

$paramId = $_GET['id'];
$response_obj = null;

if (isset($paramId) && is_numeric($paramId) && (int)$paramId > 0) {
    delete((int)$paramId);
    $response_obj = (Object) array('success' => true);
} else {
    http_response_code(400);
    $response_obj = (Object) array('success' => false);
}

header('Content-Type: application/json');
echo json_encode($response_obj);
