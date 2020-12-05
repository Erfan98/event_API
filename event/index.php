<?php
require_once('eventcontroller.php');

$controller = new event_controller();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $event = $controller->get_events_byid($id);
        jsonresponse($event);
        return;
    }

    $event = $controller->get_events();

    jsonresponse($event);

}

if($_SERVER['REQUEST_METHOD']=='POST'){
    jsonresponse($controller->create_event($_POST['name'],$_POST['time'],$_POST['location']));
}



function jsonresponse($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}