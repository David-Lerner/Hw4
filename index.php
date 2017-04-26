<?php
namespace complete_sudoku\hw4;

use complete_sudoku\hw4\controllers as C;
use complete_sudoku\hw4\configs\Config;

require_once 'vendor/autoload.php';
if(!isset($_REQUEST['c']) || !isset($_REQUEST['m'])) {
    $controller=new C\LandingController();
    $controller->view();
} else {
    $controllertocall=$_REQUEST['c'];
    $methodtoinvoke=$_REQUEST['m'];
    
    $availablecontrollers=['landing'=>'LandingController','main'=>'MainController','api'=>'ApiController'];

    if(isset($availablecontrollers[$controllertocall])) {
        //It is a valid controller
        $controllerclass='complete_sudoku\\hw4\\controllers\\' . $availablecontrollers[$controllertocall];
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