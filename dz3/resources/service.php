<div class="horo_header-block">
    <div class="name-cont">
        <div class="title-cont">
            <a href="/" title="<?= $projectName; ?>">
                <strong><?= $projectName; ?></strong>
            </a>
        </div>
        <div class="date-cont">
            Сегодня <span><?= date('j') . ' ' . $GLOBALS['mounts'][date('n')]; ?></span>, <?= $GLOBALS['days'][date('N')]; ?>
        </div>
    </div>
    <div class="logo-cont">
        <img class="logo" src="data:image/gif;base64,R0lGODlhAQABAIABAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAICTAEAOw==">
    </div>
</div>