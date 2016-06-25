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

                        <div class="file_auth-block">
                            <div class="auth-head">
                                <h2><?= $isAdmin ? 'Здравствуйте админ!' : 'Вход на сайт'; ?></h2>
                            </div>
                            <div class="auth-body">
                               <? echo $success ?>
                                <? if (isset($success)) { ?>
                                    <div class="alert-cont success">
                                        <? foreach ($success as $value) { ?>
                                            <?= isset($value) ? $value : null; ?><br />
                                        <? } ?>
                                    </div>
                                    <script type="text/javascript">
                                        Editor.reload();
                                    </script>
                                <? } ?>
                                <? if (isset($error)) { ?>
                                    <div class="alert-cont error">
                                        <? foreach ($error as $value) { ?>
                                            <?= @$value ?><br />
                                        <? } ?>
                                    </div>
<!--                                    Здесь у тебя неопроеделенные переменные-->
<!--                                    можно сделать как я сделал -->
<!--                                    но лучше таких переменных не обьявлять вобще-->
                                <? } ?>
                                <? if (!isset($success)) { ?>
                                    <form method="post">
                                        <? if ($isAdmin) { ?>
                                        <div class="group-cont">
                                            <input type="submit" name="send" value="Выйти" onclick="" />
                                        </div>
                                        <? } else { ?>
                                        <div class="group-cont">
                                            <input type="text" name="login" placeholder="Введите логин" />
                                        </div>
                                        <div class="group-cont">
                                            <input type="text" name="password" placeholder="Введите пароль" />
                                        </div>
                                        <div class="group-cont">
                                            <input type="submit" name="send" value="Войти" />
                                        </div>
                                        <? } ?>
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