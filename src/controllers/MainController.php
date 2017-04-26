<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;
use complete_sudoku\hw4\configs\Config;

class MainController extends Controller
{

    public function view()
    {
        $data = ["name"=>"Web Sheets"];
        $hash = (isset($_REQUEST['arg1'])) ? filter_var($_REQUEST['arg1'], FILTER_SANITIZE_STRING) : "";
        $sheetCodeModel = new M\SheetCodeModel();
        $sheet = $sheetCodeModel->getSheetAndTypeByCode($hash);
        if (isset($sheet["sheet_name"])) {
            $data["sheet"] = $sheet;
            $data["editHash"] = substr(md5($sheet["sheet_name"] . "edit"), 0, 8);
            $data["readHash"] = substr(md5($sheet["sheet_name"] . "read"), 0, 8);
            $data["fileHash"] = substr(md5($sheet["sheet_name"] . "file"), 0, 8);
            if ($sheet["code_type"] == "edit") {
                $views = new V\EditView();
                $views->render($data);
            } else if ($sheet["code_type"] == "read") {
                $views = new V\ReadView();
                $views->render($data);
            } else {
                //display xml;
            }
        } else {
        
            header("Location:" . Config::BASE_URL . "\index.php");
        }
        
    }
    
}
?>