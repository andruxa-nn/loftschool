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

                            <div class="file_upload-block">
                                <div class="upload-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="file" name="userfile" />
                                        <input type="submit" value="Отправить" />
                                    </form>
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