<?php require_once 'layout/header.php';?>
<body class='<?=$page?>'>
<?php require_once 'layout/nav.php';?>
<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из списка файлов</h2>
    <table class="table table-bordered">
        <tr>
            <th>Название файла</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>
        <?php
        echo '<tr>';
        foreach ($data as $val) { ?>
            <td><?= $val['photo'] ?></td>
            <td><img src="<?= $url . '/photos/' . $val['photo'] ?>"></td>
            <td><a class="delete" href="delete/<?= $val['id'] ?>">
                    <img src="<? echo $url . '/images/del.jpg'; ?>"/>
                </a>
            </td>
            <?php echo '</tr>';
        } ?>
    </table>
</div><!-- /.container -->
<?php require_once 'layout/footer.php';?>

