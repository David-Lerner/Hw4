<?php 
namespace complete_sudoku\hw4\views;

//use complete_sudoku\hw4\views\helpers as H;
class landingView {
    function render($data)
    {
        ?>
         
        <form action="" method="POST">
        <h1><a href='./index.php'>Web Sheets</a></h1>
        
        <input type="text" class="name-code-field" placeholder="New Sheet Name or Code"/>
        <input type="submit" name="button" class="go-button" value="Go"/>
        
        </form>
    <?php 
    }
}
