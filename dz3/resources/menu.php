<div class="servicesMenu-block">
    <div class="servicesMenu-body">
        <div class="title-cont">
            <h1><?= $projectName; ?></h1>
        </div>
        <? if (isset($isAdmin) && $isAdmin) { ?>
        <div class="list-cont">
            <a href="./?page=create">Создать файл</a>
            <a href="./?page=upload">Загрузить файл</a>
        </div>
        <? } ?>
        <br class="clear">
    </div>
</div>