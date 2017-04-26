<?php 
namespace complete_sudoku\hw4\views;

use complete_sudoku\hw4\views\layouts as L;
//use complete_sudoku\hw4\views\helpers as H;
class landingView extends View{
    
    public $header_display;
    public $footer_display;
    
    public function __construct(){

        $this->header_display = new L\HeaderLayout($this);
        $this->footer_display = new L\FooterLayout($this);
    }
  
    function render($data)
    {
        $this->header_display->render($data);
        ?>
        <h1><a href='./index.php'><?=$data["name"]?></a></h1> 
        <form action="index.php" onsubmit="return validateForm()" method="GET">
            <input type="hidden" name="c" value="landing" />
            <input type="hidden" name="m" value="submit" />
            <input type="text" id="name-code-field" name="arg1"  placeholder="New Sheet Name or Code" />
            <input type="submit" value="Go">
        </form>
        <script>
        function validateForm() {
            var x = document.getElementById("name-code-field").value;
            if (x === "") {
                alert("Field is empty");
                return false;
            } else if (!/^[a-z0-9]+$/i.test( x )) {
                alert("Characters must be alphanumeric");
                return false;
            }
        }
        </script>
        <?php
        $this->footer_display->render($data);
    }
}
