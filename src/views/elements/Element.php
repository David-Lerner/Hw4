<?php
namespace complete_sudoku\hw4\views\elements;

abstract class Element {

	public function __construct(){
	}

	public abstract function render($data);
}
?>