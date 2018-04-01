<?php

namespace App;

class Filelist extends MainController
{
    public function index()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data = $userInfo->allPhoto();
        $dataPage['page'] = 'filelist';
        $this->view->render('filelist', $data, $dataPage);
    }
    public function delete()
    {
        $this->checkSession();

        $userInfo = new Users();
        $dataUser = $userInfo->getUserInfo();
        $dataPage['user'] = $dataUser;

        $data = $userInfo->deleteAvatar();
        $dataPage['page'] = 'userlist';
        $datas['msg'] = $data;
        $this->view->render('userdelete', $datas, $dataPage);
    }
}