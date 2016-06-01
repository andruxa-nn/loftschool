<!doctype html>
<html lang="ru">
<head>
    <?= view('header', ['title' => $title]); ?>
</head>
<body>
    <div class="main-wrap">
        <div class="menu-cont">
            <?= view('menu', ['projectName' => $projectName, 'isAdmin' => $isAdmin]); ?>
        </div>
        <div class="body-cont">
            <div class="wrap-cols">
                <div class="wrap-cont">
                    <div class="row-cont">
                        <div class="horo-cont">
                            <?= view('service', ['projectName' => $projectName]); ?>

                            <div class="file_read-block">
                                <? if (isset($file) && $file) { ?>
                                <div class="read-head">
                                    <h2>Просмотр файла <?= $file['name']; ?></h2>
                                </div>
                                <div class="read-body">
                                    <? if ($file['type'] == 'image') { ?>
                                    <img src="<?= '/files/' . $file['name']; ?>" />
                                    <? } elseif ($file['type'] == 'text') { ?>
                                    <?= nl2br($file['body']); ?>
                                    <? } ?>
                                </div>
                                <? } elseif (!empty($_REQUEST['file'])) { ?>
                                <div class="read-body">
                                    Файла с данным именем не существует.
                                </div>
                                <? } ?>
                            </div>

                        </div>
                    </div>
                </div>

                <br class="clear">
            </div>
        </div>
        <div class="footer-cont">
            <?= view('footer'); ?>
        </div>
    </div>
</body>
</html>