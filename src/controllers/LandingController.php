<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;
use complete_sudoku\hw4\configs\Config;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LandingController extends Controller
{

	
    public function view()
    {

	$log = new Logger('logger');
	$log->pushHandler(new StreamHandler('./app_data/spread.log', Logger::INFO));

	$log->info('Visited Landing Page');
	

        $data = ["name"=>"Web Sheets"]; //must populate
        $views=new V\LandingView();
        $views->render($data);
    }
    
    public function submit()
    {
        
        $input = (isset($_REQUEST['arg1'])) ? filter_var($_REQUEST['arg1'], FILTER_SANITIZE_STRING) : "";
        
        if ($input != "") {
            $sheetModel = new M\SheetModel();
            $sheetCodeModel = new M\SheetCodeModel();
            
            $sheet = $sheetCodeModel->getSheetAndTypeByCode($input);
            if (isset($sheet["sheet_name"])) {
                header("Location:" . Config::BASE_URL . "\index.php?c=main&m=view&arg1=" . $input);
            } else {
                $sheet = $sheetModel->getSheetByName($input);
                if (isset($sheet["sheet_name"])) {
                    $editHash = substr(md5($sheet["sheet_name"] . "edit"), 0, 8);
                    header("Location:" . Config::BASE_URL . "\index.php?c=main&m=view&arg1=" . $editHash);
                } else {
                    $data = [["",""],["",""]];
                    $id = $sheetModel->addSheet($input, $data);
                    $editHash = substr(md5($input . "edit"), 0, 8);
                    $readHash = substr(md5($input . "read"), 0, 8);
                    $fileHash = substr(md5($input . "file"), 0, 8);
                    $sheetCodeModel->addSheetCode($id, $editHash, "edit");
                    $sheetCodeModel->addSheetCode($id, $readHash, "read");
                    $sheetCodeModel->addSheetCode($id, $fileHash, "file");
                    header("Location:" . Config::BASE_URL . "\index.php?c=main&m=view&arg1=" . $editHash);
                }
            }
            //add error checks
            $sheetModel->closeConnection();
            $sheetCodeModel->closeConnection();           
        } else {
            header("Location:" . Config::BASE_URL . "\index.php");
        }    
        
    }
}
?>
