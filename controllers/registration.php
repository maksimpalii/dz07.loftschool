<?php

namespace App;

class Registration extends MainController
{
    public function index()
    {
        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data['page'] = 'registr';
        $dataPage['page'] = 'registr';
        $this->view->render('registration', $data, $dataPage);
    }

    public function post()
    {
        $userModel = new Users();
        $userModel->registrUser();
    }
}
