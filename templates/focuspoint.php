<?php
/**
  * @templatename: 03. Focuspoint
  */
?>
<?php get_focuspoint_picture('caterpillar_02.jpg','caterpillar',[],[480,768,1280],['x'=> -0.2,'y'=> -0.15],['wide']); ?>

<section class="container-fluid">
  <div class="container">
    <h2 class="my-5">Focuspoint Example</h2>

    <div class="fp-example">

      <div class="card">
        <?php get_focuspoint_picture('caterpillar_01.jpg','caterpillar'); ?>
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card">
        <?php get_focuspoint_picture('caterpillar_02.jpg','caterpillar',array('class' => 'card-img-top'),[480,768,1280],['x'=>0.39,'y'=>-0.04]); ?>
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card">
        <?php get_focuspoint_picture('caterpillar_03.jpg','caterpillar',array('class' => 'card-img-top')); ?>
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

    </div>
  </div>
</section>
