<?php
/**
  * @templatename: 10. Editable text example
  */
?>

<section class="container-fluid">
  <div class="container pt-5">
    <h2><?php _pt('page.headline', 'Sample page for editable text'); ?></h2>

    <p><?php _pt('page.leadtext', 'Thanks to our awesome devs we can now make any text editable'); ?></p>

    <a href="?page=dynamic-text" class="btn btn-primary"><?php _pt('button.showPage', 'Show the normal page'); ?></a>
    <a href="?page=dynamic-text&amp;showPtOriginals=1" class="btn btn-primary"><?php _pt('button.showOriginals', 'Show the original default texts'); ?></a>
    <a href="?page=dynamic-text&amp;showPtKeys=1" class="btn btn-primary"><?php _pt('button.showPage', 'Show the text keys'); ?></a>
  </div>
</section>
