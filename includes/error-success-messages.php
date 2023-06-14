<?php

    if(isset($_SESSION["error"])): ?>
        <input type="text" value="<?= $_SESSION["error"] ?>" readonly aria-invalid="true">
    <?php endif;
    $_SESSION["error"] = null;

    if(isset($_SESSION["success"])): ?>
        <input type="text" value="<?= $_SESSION["success"] ?>" readonly aria-invalid="false">
<?php endif;
$_SESSION["success"] = null;