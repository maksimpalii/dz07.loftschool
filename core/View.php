<?php

namespace App;

class View
{
    public function render($filename, array $data , array $dataPage)
    {
        extract($data);
        extract($dataPage);
        require_once __DIR__ . "/../views/" . $filename . ".php";
    }
}

