<?php
namespace complete_sudoku\hw4\controllers;

use complete_sudoku\hw4\views as V;
use complete_sudoku\hw4\models as M;
use complete_sudoku\hw4\controllers\Controller;

class LandingController extends Controller
{

    public function mainAction()
    {
        $data = []; //must populate
        $views=new V\LandingView();
        $views->render($data);
    }
}
?>