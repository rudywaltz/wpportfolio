<?php /* Template Name: Home */ ?>
<?php get_header('simple'); ?>
<div class="op-content__leftside">
  <?php get_template_part( 'templates/nav', 'menu'); ?>
  <?php $exhibitions = get_field('exhibitions'); ?>
  <?php if( $exhibitions ): ?>
    <ul class="op-exhibitionlist">
      <?php while ( has_sub_field('exhibitions') ) : ?>
        <li class="op-exhibitionlist__details <?php if( get_row_layout() == 'actual' ) echo 'op-exhibitionlist__details-actual' ?> <?php if( get_row_layout() == 'future' ) echo 'op-exhibitionlist__details-next' ?> op-exhibition">
          <div class="op-exhibition__header">
            <?php
              $type = get_row_layout();
              if(function_exists('pll_e')) {
                if ($type == 'past' ):
                  pll_e( 'Volt' );
                elseif($type == 'now'):
                  pll_e( 'Most' );
                elseif($type == 'then'):
                  pll_e( 'Majd' );
                endif;
              }
            ?>
          </div>
          <div class="op-exhibition__title">
            <?php if(get_sub_field('link')): ?>
              <a href="<?php echo the_sub_field('link') ?>">
            <?php endif; ?>
              <?php echo the_sub_field('title') ?>
            <?php if(get_sub_field('link')): ?>
              </a>
            <?php endif; ?>
          </div>
          <div class="op-exhibition__location"><?php echo the_sub_field('location') ?></div>
          <div class="op-exhibition__date"><?php echo the_sub_field('date_opening') ?> - <?php echo the_sub_field('date_end') ?></div>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</div>
<div class="op-content__rightside">
  <?php require_once('templates/slider.php'); ?>
</div>
<?php  get_footer(); ?>
