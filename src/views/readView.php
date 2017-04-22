<?php 
namespace complete_sudoku\hw4\views;

//use complete_sudoku\hw4\views\helpers as H;
class readView {
	function render($data)
    {
        ?>
         <form>
        <h1><a href='./index.php'>Web Sheets:</a></br>Your Spreadsheet Name</h1>
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" />
        </form>
    <?php
    }
}
