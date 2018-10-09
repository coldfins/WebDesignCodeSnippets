<?php global $args, $component_name, $show_code; ?>
<article class="container-fluid componentsclass"<?= $show_code ? ' data-comcode="'.$component_name.'" data-args=\''.json_encode($args).'\'' : '' ?>>
  <section class="container pt-5">
    <h2><?= $args->title ?></h2>
    <p><?= $args->text ?></p>
    <?php get_picture($args->img); ?>
  </section>
</article>
