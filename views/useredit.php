<?php require_once 'layout/header.php'; ?>
<body class='<?= $page ?>'>
<?php require_once 'layout/nav.php'; ?>
<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Профиль пользователя</h2>
    <div class="form-container">
        <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="inputEmail3" value="<?= $login ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Новый пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3"
                           placeholder="не обязательно">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputName" value="<?= $name ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="text" name="age" class="form-control" id="inputAge" value="<?= $age ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="inputDescription"
                           value="<?= $description ?>">
                </div>
            </div>
            <div class="form-group">
                <img src=" <?php if (!empty($photo)) {
                    echo $url . '/photos/' . $photo;
                } else {
                    echo $url . '/images/notphoto.jpg';
                } ?>"/>
                <label for="input" class="col-sm-2 control-label">Изображение</label>
                <div class="col-sm-10">
                    <input type="file" name="file" id="inputFile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
            <div class="form-group">
                <div id="outmessage"><?= $msg ?></div>
            </div>
        </form>
    </div>
</div><!-- /.container -->
<?php require_once 'layout/footer.php'; ?>

