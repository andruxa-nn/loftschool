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

                            <div class="file_create-block">
                                <div class="create-head">
                                    <h2>Создать файл</h2>
                                </div>
                                <div class="create-body">
                                    <? if (isset($success)) { ?>
                                        <div class="alert-cont success">
                                            <? foreach ($success as $value) { ?>
                                                <?= $value; ?><br />
                                            <? } ?>
                                        </div>
                                    <? } ?>
                                    <? if (isset($error)) { ?>
                                        <div class="alert-cont error">
                                            <? foreach ($error as $value) { ?>
                                                <?= $value; ?><br />
                                            <? } ?>
                                        </div>
                                    <? } ?>
                                    <? if (!isset($success)) { ?>
                                    <form method="post">
                                        <div class="group-cont">
                                            <input type="text" name="fileName" value="<?= isset($error) ? $file['name'] : ''; ?>" placeholder="Введите название файла" /> .txt
                                        </div>
                                        <div class="group-cont">
                                            <textarea name="fileBody" placeholder="Введите содержимое файла"><?= isset($error) ? $file['text'] : ''; ?></textarea>
                                        </div>
                                        <div class="group-cont">
                                            <input type="submit" name="send" value="Сохранить" />
                                        </div>
                                    </form>
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