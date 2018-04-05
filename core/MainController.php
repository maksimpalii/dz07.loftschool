<?php

namespace App;

class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function clearAll($datas, $isarray = false)
    {
        if ($isarray === false) {
            $data = strip_tags($datas);
            $data = htmlspecialchars($datas, ENT_QUOTES);
        } else {
            $data = [];
            foreach ($datas as $key => $value) {
                $data[$key] = htmlspecialchars(strip_tags($value), ENT_QUOTES);
            }
        }
        return $data;
    }

    public function checkSession()
    {
        if ($_SESSION['user'] !== 'logged') {
            header('Location: /', true, 307);
            die();
        }
    }

}