<?php
    //session_save_path("D:/");
    //session_start();
    //make connection to database visible to the rest of the project
    include_once('connection.php');
    //check if controller and action have been determined
    if(isset($_GET['controller'], $_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else if(isset($_POST['controller'], $_POST['action'])){
        $controller = $_POST['controller'];
        $action = $_POST['action'];
    } else {
        $controller = 'main';
        $action = 'login';
    }
    //route user to the appropriate controller (file that controls what is viewed, and what data is accessed)
    require_once('route.php');
?>