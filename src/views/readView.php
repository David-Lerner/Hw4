<?php
namespace complete_sudoku\hw4\views;

use complete_sudoku\hw4\views\layouts as L;
use complete_sudoku\hw4\configs\Config;

//use complete_sudoku\hw4\views\helpers as H;
class readView extends View {
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
        <h1><a href='./index.php'><?=$data["name"]?></a>: <?=$sheet["sheet_name"]?></h1>
        <div>File Url:<span class=".url"><input type="text" disabled="disabled" value="<?=Config::BASE_URL?>/index.php?c=main&m=view&arg1=<?=$data["fileHash"]?>"/></span></div>
        <div id="spreadsheet_read"></div>
        <script>
        readSheet = new Spreadsheet("spreadsheet_read", <?php echo json_encode($sheet["sheet_data"]); ?>); //editable
        readSheet.draw();
        </script>
        <?php
        $this->footer_display->render($data);
    }
}



