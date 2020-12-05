<?php
require('db.php');

$db =new Db;

$connection= $db->dbconnect();

if($connection) print_r($connection);
