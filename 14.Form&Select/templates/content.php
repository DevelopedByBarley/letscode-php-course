<div class="container">
    <form action="">
        <div class="form-group">
            <label for="size">Page size</label>
            <select name="size" id="size">
                <?php foreach ($possiblePageSizes as $pageSize) : ?>

                    <option <?php if ($pageSize == $size) : ?> selected="selected" <?php endif ?>> <?= $pageSize ?> </option>

                <?php endforeach ?>
            </select>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
    <?php require "pagination.php" ?>
    <?php foreach ($page as $picture) : ?>
        <img src="<?= $picture["thumbnail"] ?>" alt="<?= $picture["title"] ?>" style="height: 250px; width: 250px;">
    <?php endforeach ?>
    <?php require "pagination.php" ?>
</div>
<?php var_dump($size) ?>