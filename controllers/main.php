<?php

namespace App;

class Main extends MainController
{
    public function index()
    {
        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data['page'] = 'home';
        $dataPage['page'] = 'home';
        $this->view->render('main', $data, $dataPage);
    }

    public function post()
    {
        $loginUser = new Users();
        $loginUser->loginUser();
    }
}