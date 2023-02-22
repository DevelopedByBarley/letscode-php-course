<div class="container">


    <?php foreach($page as $picture): ?>
        <img src="<?= $picture["thumbnail"] ?>" alt="<?= $picture["title"] ?>" style="height: 250px; width: 250px;">
    <?php endforeach ?>
</div>