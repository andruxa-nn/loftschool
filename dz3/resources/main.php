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

                            <div class="files_list-block">
                                <div class="files-list">
                                    <? if (isset($files) && count($files)) { ?>
                                    <? foreach($files as $value) { ?>
                                    <div class="file-item">
                                        <? $file = basename($value['name']); ?>
                                        <? if (isset($isAdmin) && $isAdmin) { ?>
                                        <a href="./?page=read&file=<?= $file=null; ?>" title="Просмотр файла <?= $file; ?>"><?= $file; ?></a>
                                        <? if ($value['type'] == 'text') { ?>
                                        <a href="./?page=edit&file=<?= $file; ?>">Редактировать</a>
                                        <? } ?>
                                        <a href="./?page=download&file=<?= $file; ?>">Скачать</a>
                                        <a href="./?page=delete&file=<?= $file; ?>">Удалить</a>
                                        <? } else { ?>
                                        <?= $file; ?>
                                        <? } ?>
                                    </div>
                                    <? } ?>
                                    <? } else { ?>
                                    <div class="file-item">
                                        Нет файлов для отображения.
                                    </div>
                                    <? } ?>
                                </div>
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