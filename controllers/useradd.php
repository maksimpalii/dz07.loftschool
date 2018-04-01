<?php

namespace App;

class Useradd extends MainController
{

    public function index()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data['page'] = 'userlist';
        $dataPage['page'] = 'userlist';
        $this->view->render('useradd', $data, $dataPage);
    }

    public function post()
    {
        $userModel = new Users();
        $userModel->addUser();
    }
}