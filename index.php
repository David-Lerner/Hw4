<?php
namespace complete_sudoku\hw4;

use complete_sudoku\hw4\controllers as C;

require_once 'vendor/autoload.php';
if(!isset($_REQUEST['c']) || !isset($_REQUEST['m'])) {
    $controller=new C\LandingController();
    $controller->mainAction();
} else {
    $controllertocall=$_REQUEST['c'];
    $methodtoinvoke=$_REQUEST['m'];
    
    $availablecontrollers=['LandingController','EditController','ReadController'];

    if(in_array($controllertocall,$availablecontrollers)) {
        //It is a valid controller
        $controllerclass='complete_sudoku\\hw4\\controllers\\' . $controllertocall;
        $controller=new $controllerclass();
        if(method_exists($controller,$methodtoinvoke)) {
            //it is a valid method in the controller
            $controller->$methodtoinvoke();
        } else {
            //print("Error: Invalid method called. Page cannot be displayed");
            header("Location:" . Config::BASE_URL . "\index.php");
        }
    } else {
        //print("Error: Page not found! Invalid Controller called");
        header("Location:" . Config::BASE_URL . "\index.php");
    }
}
?>