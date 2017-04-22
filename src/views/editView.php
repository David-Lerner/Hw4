<?php 
namespace complete_sudoku\hw4\views;

//use complete_sudoku\hw4\views\helpers as H;
class editView {
      function render($data)
    {
        ?>
        <form>
        <h1><a href='./index.php'>Web Sheets:</a></br>Your Spreadsheet Name</h1>
        <label class="input-labels" for="edit-url">Edit Url:</label>
        <input type="text" name="edit-url" class="edit-url" />
        <label class="input-labels" for="read-url">Read Url:</label>
        <input type="text" name="read-url" class="read-url" />
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" />
        </form>
<?php
    }
}



