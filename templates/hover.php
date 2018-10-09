<?php
/**
  * @templatename: 05. Hover effects
  */
?>

<section class="container-fluid">
  <div class="container pt-5">
    <h2>Hover effect samples</h2>

    <div class="row">

      <div class="col-md-4">
        <div class="teaser teaser--neutral">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Neutral state
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--scale-up teaser--fly-up">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Scale img and fly text up on hover
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--shade">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Throw gradient shade over img on hover
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--shade-primary">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Primary color shade over img on hover
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--shade teaser--scale-up teaser--fly-up">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Scale, shade and fly-up combo
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--grow">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Grow on hover
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--fly-from-left">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Text flies in from left
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--fly-from-right">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Text flies in from right
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--fly-down">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Text flies in from top
      </div>

      <div class="col-md-4">
        <div class="teaser teaser--scale-down teaser--fly-down">
          <?php get_picture('caterpillar_01.jpg'); ?>
          <div class="teaser__text">
            What a nice caterpillar.
          </div>
        </div>
        Scale img and fly text down on hover
      </div>

    </div>

  </div>
</section>
