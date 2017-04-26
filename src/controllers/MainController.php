<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;

class MainController extends Controller
{

    public function view()
    {
        $sheetCodeModel = new M\SheetCodeModel();
        $data = ["name"=>"Web Sheets"]; //must populate
        $views=new V\LandingView();
        $views->render($data);
    }
    
}
?>