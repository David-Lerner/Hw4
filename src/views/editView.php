<?php
namespace complete_sudoku\hw4\views;

use complete_sudoku\hw4\views\layouts as L;
use complete_sudoku\hw4\configs\Config;

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
        <h1><a href='./index.php'><?=$data["name"]?></a>: <?=$sheet["sheet_name"]?></h1>
        <div>Edit Url:<span class=".url"><input type="text" disabled="disabled" value="<?=Config::BASE_URL?>/index.php?c=main&m=view&arg1=<?=$data["editHash"]?>"/></span></div>
        <div>Read Url:<span class=".url"><input type="text" disabled="disabled" value="<?=Config::BASE_URL?>/index.php?c=main&m=view&arg1=<?=$data["readHash"]?>"/></span></div>
        <div>File Url:<span class=".url"><input type="text" disabled="disabled" value="<?=Config::BASE_URL?>/index.php?c=main&m=view&arg1=<?=$data["fileHash"]?>"/></span></div>
        <div id="spreadsheet_edit"></div>
        <script>
        editSheet = new Spreadsheet("spreadsheet_edit", <?php echo json_encode($sheet["sheet_data"]); ?>, {"mode":"write"}); //editable
        editSheet.draw();
        </script>
        <?php
        $this->footer_display->render($data);
    }
}



