<?php

  namespace complete_sudoku\hw4\views\layouts;

  use complete_sudoku\hw4\views\View;
  use complete_sudoku\hw4\configs\Config;

  class HeaderLayout extends Layout{

    public function render($data){
      ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title><?= $data["name"] ?></title>
          <base href="<?= Config::BASE_URL ?>/"/>
          <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>/src/styles/common.css">
          <script src="src/scripts/spreadsheet.js"></script>
        </head>
        <body>
      <?php
    }

  }
 ?>