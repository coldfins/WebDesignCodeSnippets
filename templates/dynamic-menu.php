<?php
/**
  * @templatename: 11. Editable text example
  */
?>

<section class="container-fluid">
  <div class="container pt-5">
    <h2><?php _pt('page.headline', 'Dynamic Menu'); ?></h2>

    <?php
    $rawData = file_get_contents('app/menu.json');
    $data = json_decode($rawData);
    $menuStructure = require('app/menuStructure.php');
    ?>

    <ul>
      <?php echo renderMenu($data->menu, $menuStructure); ?>
    </ul>
  </div>
</section>
