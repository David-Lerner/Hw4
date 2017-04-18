<?php
namespace complete_sudoku\hw4\views;

abstract class View {

	public function __construct(){
	}

	public abstract function render($data);
}
?>