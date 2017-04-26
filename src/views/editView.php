<?php
namespace complete_sudoku\hw4\views;

use complete_sudoku\hw4\views\layouts as L;

//use complete_sudoku\hw4\views\helpers as H;
class editView extends View {
    public $header_display;
    public $footer_display;
    
    public function __construct(){

        $this->header_display = new L\HeaderLayout($this);
        $this->footer_display = new L\FooterLayout($this);
    }
  
    function render($data)
    {
        $sheet = $data["sheet"];
        
        $this->header_display->render($data);
        ?>
        <h1><a href='./index.php'><?=$data["name"]?></a></br><?=$sheet["sheet_name"]?></h1>
        <form>       
        <label class="input-labels" for="edit-url">Edit Url:</label>
        <input type="text" name="edit-url" class="edit-url" />
        <label class="input-labels" for="read-url">Read Url:</label>
        <input type="text" name="read-url" class="read-url" />
        <label class="input-labels" for="file-url">File Url:</label>
        <input type="text" name="file-url" class="file-url" />
        </form>
        <?php
        $this->footer_display->render($data);
    }
}



