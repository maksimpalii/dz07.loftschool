<?php

namespace App;

class Userlist extends MainController
{

    public function index()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data = $userInfo->allUser();
        $dataPage['page'] = 'userlist';
        $this->view->render('userlist', $data, $dataPage);
    }

    public function delete()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data = $userInfo->deleteUser();
        if ($data === 'Вы удалили себя!') {
            unset($_SESSION["user"]);
            unset($_SESSION["login"]);
            session_destroy();
        }
        $dataPage['page'] = 'userlist';
        $datas['msg'] = $data;
        $this->view->render('userdelete', $datas, $dataPage);
    }

    public function edit()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $datas = $userInfo->getUser();
        $dataPage['page'] = 'userlist';
        $this->view->render('useredit', $datas, $dataPage);
    }

    public function post()
    {
        $this->checkSession();

        $editUser = new Users();
        $editUser->editUser();
    }
}