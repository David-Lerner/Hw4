<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;
use complete_sudoku\hw4\configs\Config;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MainController extends Controller
{

    public function view()
    {

	$log = new Logger('logger');
	$log->pushHandler(new StreamHandler('./app_data/spread.log', Logger::INFO));
	
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
		$log->info('Visited Edit Page');
            } else if ($sheet["code_type"] == "read") {
                $views = new V\ReadView();
                $views->render($data);
		$log->info('Visited Read Page');
            } else {
                //print_r($data['sheet']);
                $xml = 
'<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE spreadsheet [

<!ELEMENT spreadsheet (row+)>
<!ELEMENT row (cell+)>
<!ELEMENT cell (#PCDATA)>

<!ATTLIST spreadsheet name CDATA #REQUIRED>
]>
';
                $xml .= '<spreadsheet name="' . $sheet["sheet_name"] . '">';
                foreach($sheet["sheet_data"] as $key=>$val){
                    $xml .= '<row>';
                    foreach($val as $k=>$v){
                       $xml .= '<cell>';
                       $xml .= htmlspecialchars($v);
                       $xml .= '</cell>';
                    }
                    $xml .= '</row>';
                }
                $xml .= '</spreadsheet>';
                header('Content-type: text/xml');
                echo $xml;
            }
        } else {
		
		$log->info('Visited Landing Page');
        
            header("Location:" . Config::BASE_URL . "\index.php");
        }
        
    }
    
}
?>
