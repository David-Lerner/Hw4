<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;

class ReadController extends Controller
{

    public function mainAction()
    {
        $data = []; //must populate
        $views=new V\ReadView();
        $views->render($data);
    }
}
?>