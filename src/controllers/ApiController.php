<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;

class ApiController extends Controller
{

    public function update()
    {
        //echo $_REQUEST['arg2'];
        $name = (isset($_REQUEST['arg1'])) ? filter_var($_REQUEST['arg1'], FILTER_SANITIZE_STRING) : ""; 
        //echo $input;
        $data = json_decode(html_entity_decode($_REQUEST['arg2']));
        if (is_array($data)) {
            $sheetModel = new M\SheetModel();
            $sheetModel->updateSheet($name, $data);
            //oncomplete -add error check
            echo "<br/>";
            $sheetModel->closeConnection();
        } else {
            echo "Error: Invalid data";
        }
    }
    
}
?>