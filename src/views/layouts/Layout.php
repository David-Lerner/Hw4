<?php
namespace complete_sudoku\hw4\views\layouts;

abstract class Layout {

	public function __construct(){
	}

	public abstract function render($data);
}
?>