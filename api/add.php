<?php

include_once 'beans/todo.php';
include_once 'dao/MTodo.php';

function add ($value) {
    $mtodo = new MTodo();
    $id = $mtodo->add(new Todo(null, $value));

    if ($id !== false && is_integer($id)) {
        return new Todo($id, $value);
    }
    return null;
}

$paramVal = $_POST['value'];
$response = null;

header('Content-Type: application/json');
if (isset($paramVal) && is_string($paramVal) && strlen(trim($paramVal)) > 0) {
    $response_obj = add(trim($paramVal));
    echo json_encode($response_obj);
} else {
    http_response_code(400);
    $response_obj = (Object) array( "error" => 'Param: `value` should be a valid non empty string.' );
    echo json_encode($response_obj);
}
