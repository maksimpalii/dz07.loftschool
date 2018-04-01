<?php

namespace App;

trait FileController
{
    public function uploadImg($fileUpload, $login)
    {
        if ($fileUpload['file']['size'] === 0) {
            echo 'not img';
        } else {
            $file = $fileUpload['file'];
            if (preg_match('/jpg/', $file['name']) or preg_match('/jpeg/', $file['name']) or preg_match('/png/', $file['name']) or preg_match('/gif/', $file['name'])) {
                if (preg_match('/jpg/', $file['type']) or preg_match('/jpeg/', $file['type']) or preg_match('/png/', $file['type']) or preg_match('/gif/', $file['type'])) {
                    //echo 'Файл имеет верный mime-type. "Доверяем" и загружаем его' . PHP_EOL;
                    $image = new SimpleImage();
                    $image->load($fileUpload['file']['tmp_name']);
                    $image->resize(100, 100);
                    $image->save('photos/' . $login . '_' . $file['name']);
                    $url = 'photos/' . $login . '_' . $file['name'];
                    //echo "Выводим результат проверки: file-type: " . mime_content_type('photos/' . $file['name']) . PHP_EOL;
                    $nurl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $url;
                    // return $nurl;
                    return $login . '_' . $file['name'];
                }
            } else {
                echo 'error img';
            }
        }
    }
}
