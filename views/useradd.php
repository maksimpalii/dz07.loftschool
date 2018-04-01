<?php require_once 'layout/header.php'; ?>
<body class='<?= $page ?>'>
<?php require_once 'layout/nav.php'; ?>
<div class="container">
    <h2>Добавить пользователя</h2>
    <div class="form-container">
        <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="inputEmail3" placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="text" name="age" class="form-control" id="inputAge" placeholder="Возраст">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="inputDescription"
                           placeholder="Описание">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Изображение</label>
                <div class="col-sm-10">
                    <input type="file" name="file" id="inputFile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Добавить</button>
                </div>
            </div>
            <div class="form-group">
                <div id="outmessage"></div>
            </div>
        </form>
    </div>
</div><!-- /.container -->
<?php require_once 'layout/footer.php'; ?>

