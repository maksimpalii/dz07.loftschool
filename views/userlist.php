<?php require_once 'layout/header.php'; ?>
<body class='<?= $page ?>'>
<?php require_once 'layout/nav.php'; ?>
<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из базы данных</h2>
    <a class="adduser" href="<?= $url ?>/useradd">Добавить пользователя</a>
    <table class="table table-bordered">
        <tr>
            <th>Пользователь(логин)</th>
            <th>Имя</th>
            <th>возраст</th>
            <th>описание</th>
            <th>Фотография</th>
            <th colspan="2">Действия</th>
        </tr>
        <tr>
            <?php
            foreach ($data as $val) { ?>
                <td><?= $val['login'] ?></td>
                <td><?= $val['name'] ?></td>
                <td><?= $val['age'] ?></td>
                <td><?= $val['description'] ?></td>
                <td><img src="<?php if (!empty($val['photo'])) {
                        echo $url . '/photos/' . $val['photo'];
                    } else {
                        echo $url . '/images/notphoto.jpg';
                    } ?>"/>
                </td>
                <td>
                    <a class="delete" href="edit/<?= $val['id'] ?>">
                        <img src="<? echo $url . '/images/edit.jpg'; ?>"/>
                    </a>
                </td>
                <td>
                    <a class="delete" href="delete/<?= $val['id'] ?>">
                        <img src="<? echo $url . '/images/del.jpg'; ?>"/>
                    </a>
                </td>
                <?php echo '</tr>';
            } ?>
    </table>
</div><!-- /.container -->
<?php require_once 'layout/footer.php'; ?>

