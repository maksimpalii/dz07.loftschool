<?php

namespace App;

class Users extends MainController
{
    use FileController;

    public function getUserInfo()
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('name', 'photo')->where('login', '=', $_SESSION['login'])->get();
        return $data->toArray()[0];
    }

    private function getUserAvatar($id)
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('photo')->where('id', '=', $id)->get();
        return $data->toArray()[0];
    }

    public function getUser()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $id = $routes[3];
        $elUserModel = new User();
        $data = $elUserModel::first()->where('id', '=', $id)->get();
        return $data->toArray()[0];
    }

    private function checkLogin($login)
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('login')->where('login', '=', $login)->get();
        return $data->toArray()[0];
    }

    public function loginUser()
    {
        $userModel = new Users();
        $login = $_POST['login'];
        $paswword = $_POST['password'];
        $logged = '';
        if (!empty($login) && !empty($paswword)) {
            $paswword_ver = $userModel->cryptPasswd($paswword);
            $datas = $this->autentificationUser($paswword_ver, $login);
            if (!empty($datas)) {
                if ($datas['login'] === $login) {
                    $logged = 'logged';
                    $_SESSION['user'] = 'logged';
                    $_SESSION['login'] = $login;
                }
            } else {
                $logged = 'No user';
            }
        } else {
            $logged = 'not empty';
        }
        echo $logged;
    }

    public function editUser()
    {
        if ($_SESSION['user'] !== 'logged') {
            header('Location: /', true, 307);
            die();
        }
        $userModel = new Users();
        if (!empty($_POST['login']) && !empty($_POST['name'])
            && !empty($_POST['age']) && !empty($_POST['description'])) {
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            $login = $this->clearAll($_POST['login']);
            $paswword = $this->clearAll($_POST['password']);
            $name = $this->clearAll($_POST['name']);
            $age = $this->clearAll($_POST['age']);
            $description = $this->clearAll($_POST['description']);

            $fileUpload = $_FILES;
            if ($fileUpload['file']['size'] === 0) {
                //echo 'file not' . PHP_EOL;
                if ($paswword === '') {
                    $data = ['login' => $login, 'name' => $name, 'age' => $age, 'description' => $description];
                    $userModel->updateUser($data, $routes[3]);
                } else {
                    $paswword = $userModel->cryptPasswd($paswword);
                    $data = ['login' => $login,
                        'password' => $paswword,
                        'name' => $name,
                        'age' => $age,
                        'description' => $description];
                    $userModel->updateUser($data, $routes[3]);
                    // echo 'yes' . PHP_EOL;
                }
            } else {
                //echo 'file yes' . PHP_EOL;
                $inImg = $userModel->getUserAvatar($routes[3]);
                if ($userModel->deleteOnlyPhoto($inImg['photo']) === 'delete') {
                    $img_url = $this->uploadImg($fileUpload, $login);
                    if ($img_url !== null) {
                        //echo 'new img update' .PHP_EOL;
                        if ($paswword === '') {
                            $data = ['login' => $login,
                                'name' => $name,
                                'age' => $age,
                                'description' => $description,
                                'img_url' => $img_url];
                            $userModel->updateUser($data, $routes[3]);
                        } else {
                            $paswword = $userModel->cryptPasswd($paswword);
                            $data = ['login' => $login,
                                'password' => $paswword,
                                'name' => $name,
                                'age' => $age,
                                'description' => $description,
                                'img_url' => $img_url];
                            $userModel->updateUser($data, $routes[3]);
                        }
                    }
                } else {
                    echo 'wrong delete file';
                }
            }
        } else {
            echo 'not empty';
        }
    }

    public function registrUser()
    {
        $userModel = new Users();
        $login = $this->clearAll($_POST['login']);
        $paswword = $this->clearAll($_POST['password']);
        $password_repeat = $this->clearAll($_POST['password_repeat']);
        $name = $this->clearAll($_POST['name']);
        $age = $this->clearAll($_POST['age']);
        $description = $this->clearAll($_POST['description']);

        if (!empty($login) && !empty($paswword) && !empty($name) && !empty($age) && !empty($description)) {
            if (empty($this->checkLogin($login))) {
                if ($paswword === $password_repeat) {
                    $fileUpload = $_FILES;
                    $img_url = $this->uploadImg($fileUpload, $login);
                    //var_dump($img_url);
                    if ($img_url !== null) {
                        $paswword = $userModel->cryptPasswd($paswword);
                        $data = ['login' => $login,
                            'password' => $paswword,
                            'name' => $name,
                            'age' => $age,
                            'description' => $description,
                            'img_url' => $img_url];
                        $userModel->addUserDB($data);
                        echo 'registration';
                        die();
                    }
                } else {
                    echo 'password error';
                }
            } else {
                echo 'error login';
            }
        } else {
            echo 'not empty';
        }
    }

    public function addUser()
    {
        $userModel = new Users();
        $login = $this->clearAll($_POST['login']);
        $paswword = $this->clearAll($_POST['password']);
        $name = $this->clearAll($_POST['name']);
        $age = $this->clearAll($_POST['age']);
        $description = $this->clearAll($_POST['description']);

        if (!empty($login) && !empty($paswword) && !empty($name) && !empty($age) && !empty($description)) {
            if (empty($this->checkLogin($login))) {
                $fileUpload = $_FILES;
                $img_url = $this->uploadImg($fileUpload, $login);
                //var_dump($img_url);
                if ($img_url !== null) {
                    $paswword = $userModel->cryptPasswd($paswword);
                    $data = ['login' => $login,
                        'password' => $paswword,
                        'name' => $name,
                        'age' => $age,
                        'description' => $description,
                        'img_url' => $img_url];
                    $userModel->addUserDB($data);
                    echo 'user add';
                    die();
                }

            } else {
                echo 'error login';
            }
        } else {
            echo 'not empty';
        }
    }

    public function deleteAvatar()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $id = $routes[3];
        $elUserModel = new User();
        $datas = $elUserModel::query()->select('photo')->where('id', '=', $id)->get();
        $data = $datas->toArray()[0];
        if ($data !== false) {
            if ($this->deleteOnlyPhoto($data['photo']) === 'delete') {
                $user = $elUserModel::find($id);
                $user->photo = '';
                $user->save();
                $msg = 'Аватарка удалена';
            } else {
                $msg = 'Нет доступа к фото';
            }
        } else {
            $msg = 'Такой аватарки нет';
        }
        return $msg;
    }

    private function deleteOnlyPhoto($photo)
    {
        if (file_exists('photos/' . $photo)) {
            @unlink('photos/' . $photo);
            $msg = 'delete';
        } else {
            $msg = 'no';
        }
        return $msg;
    }

    public function deleteUser()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $id = $routes[3];
        $elUserModel = new User();
        $datas = $elUserModel::query()->select('login', 'photo')->where('id', '=', $id)->get();
        $data = $datas->toArray()[0];
        if ($data !== false) {
            if ($this->deleteOnlyPhoto($data['photo']) === 'delete') {
                //$usersView = self::getPD()->prepare('DELETE FROM users WHERE id=:id');
                $user = $elUserModel::find($id);
                // $data = $user->toArray()[0];
                //  var_dump($data);
                // echo $_SESSION['login'] . ' - ' .$data['login'];
                if ($_SESSION['login'] === $data['login']) {
                    //$usersView->execute(['id' => $id]);
                    $user->delete();
                    $msg = 'Вы удалили себя!';
                } else {
                    //$usersView->execute(['id' => $id]);
                    $user->delete();
                    $msg = 'Пользователь удален';
                }
            } else {
                $msg = 'Нет доступа к фото';
            }
        } else {
            $msg = 'Такого пользователя нет';
        }
        return $msg;
    }

    public function allPhoto()
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('id', 'photo')->where('photo', '>', '')->get();
        return $data->toArray();
    }

    public function allUser()
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('login', 'name', 'age', 'description', 'photo', 'id')->get();
        return $data->toArray();
    }

    private function addUserDB($data)
    {
        $user = new User();
        $user->login = $data['login'];
        $user->password = $data['password'];
        $user->name = $data['name'];
        $user->age = $data['age'];
        $user->description = $data['description'];
        $user->photo = $data['img_url'];
        $user->save();
    }

    private function updateUser($data, $id)
    {
        $elUserModel = new User();
        if (array_key_exists('img_url', $data)) {
            if (array_key_exists('password', $data)) {
                //echo "Массив содержит 'password' & 'img_url' .";
                $user = $elUserModel::find($id);
                $user->login = $data['login'];
                $user->password = $data['password'];
                $user->name = $data['name'];
                $user->age = $data['age'];
                $user->description = $data['description'];
                $user->photo = $data['img_url'];
                $user->save();
            } else {
                //echo "Массив не содержит 'password' но содержит 'img_url' .";
                $user = $elUserModel::find($id);
                $user->login = $data['login'];
                $user->name = $data['name'];
                $user->age = $data['age'];
                $user->description = $data['description'];
                $user->photo = $data['img_url'];
                $user->save();
            }
        } else {
            if (array_key_exists('password', $data)) {
                //echo "Массив содержит 'password' и не содержит 'img_url' .";
                $user = $elUserModel::find($id);
                $user->login = $data['login'];
                $user->password = $data['password'];
                $user->name = $data['name'];
                $user->age = $data['age'];
                $user->description = $data['description'];
                $user->save();
            } else {
                //echo "Массив не содержит 'password' и не содержит 'img_url' .";
                $user = $elUserModel::find($id);
                $user->login = $data['login'];
                $user->name = $data['name'];
                $user->age = $data['age'];
                $user->description = $data['description'];
                $user->save();
            }
        }
        echo 'data update';
    }

    private function autentificationUser($password, $login)
    {
        $elUserModel = new User();
        $data = $elUserModel::query()->select('login')->where('login', '=', $login)->where('password', '=', $password)->get();
        return $data->toArray()[0];
    }

    private function cryptPasswd($data)
    {
        $passuser = crypt($data, '$6$rounds=5458$yopta23GDs43yopta$');
        return $passuser;
    }
}
