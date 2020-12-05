<?php
require('db.php');

class event_controller{

    public function get_events()
    {
        //create_connection();
        $database = new Db();
        $database_connect = $database->dbconnect();
        
        $sql = "SELECT * FROM events";
        $query = $database_connect->prepare($sql);
        $query->execute();

        $result = $query->get_result();
        $query->close();
        $database_connect->close();


        $response = array();
        while($row = $result->fetch_object()){
            array_push($response, $row);
        }

        

        return $response;
    }

    public function create_event($name,$time,$location)
    {
        $database = new Db();
        $database_connect = $database->dbconnect();


        $sql="INSERT INTO `events` (name, time, location) VALUES('$name','$time','$location')";
        $query=$database_connect->prepare($sql);
        //$query->bind_param("sss",$name,$time,$location);
        $query->execute();
        
        $last_query=$database_connect->insert_id;
        $event= $this->get_events_byid($last_query);

        
        $query->close();
        $database_connect->close();

        return $event;
    }

    public function get_events_byid($id)
    {
        $database= new Db();
        $database_connect =$database->dbconnect();

        $sql="SELECT * FROM `events` WHERE id='$id'";
        $query=$database_connect->prepare($sql);
        $query->execute();

        $result = $query->get_result()->fetch_object();

        $query->close();
        $database_connect->close();

        return $result;
    }



}