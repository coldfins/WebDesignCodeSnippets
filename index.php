<?php
require_once( 'config.php' );
require_once('body_classes.php');
$class = isset($classes[$_GET['page']]) ? $classes[$_GET['page']] : '';
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <?php get_template( 'page/head' ); ?>
  </head>
  <body class="<?= $class ?>">
    <?php get_template( 'page/page' ); ?>
  </body>
</html>
