<!doctype html>
<html lang="ru">
<head>
    <?= view('header', ['title' => $title]); ?>
</head>
<body>
    <div class="main-wrap">
        <div class="menu-cont">
            <?= view('menu', ['projectName' => $projectName]); ?>
        </div>
        <div class="body-cont">
            <div class="wrap-cols">
                <div class="wrap-cont">
                    <div class="row-cont">
                        <div class="horo-cont">
                            <?= view('service', ['projectName' => $projectName]); ?>

                            <div class="file_edit-block">
                                <? if (1 /*isset($file) && $file*/) { ?>
                                    <div class="edit-head">
                                        <h2>Редактирование файла <? // = $file['name']; ?></h2>
                                    </div>
                                    <div class="edit-body">
                                        Раздел "Редактирование файла" находится в стадии проектирования.
                                    </div>
                                <? } elseif (!empty($_REQUEST['file'])) { ?>
                                    <div class="edit-body">
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