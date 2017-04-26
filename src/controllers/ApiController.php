<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;

class ApiController extends Controller
{

    public function view()
    {
        $sheetModel = new M\SheetModel();
        $data = ["name"=>"Web Sheets"]; //must populate
        $views=new V\LandingView();
        $views->render($data);
    }
    
}
?>