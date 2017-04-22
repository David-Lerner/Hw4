<?php
namespace complete_sudoku\hw4\views\layouts;

use complete_sudoku\hw4\views\View;

abstract class Layout {

    public $view;
    
	public function __construct(View $current_view){
            $this->view = $current_view;
	}

	public abstract function render($data);
}
?>