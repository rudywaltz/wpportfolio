<?php /* Template Name: Home */ ?>
<?php get_header('simple'); ?>
<div class="op-content__leftside">
  <?php get_template_part( 'templates/nav', 'menu'); ?>
  <?php $exhibitions = get_field('exhibition'); ?>
  <?php if( $exhibitions ): ?>
    <ul class="op-exhibitionlist">
      <?php while ( has_sub_field('exhibition') ) : ?>
        <li class="op-exhibitionlist__details
        <?php if( get_row_layout() == 'actual' ) echo 'op-exhibitionlist__details-actual' ?>
        <?php if( get_row_layout() == 'future' ) echo 'op-exhibitionlist__details-next' ?>
        op-exhibition">
          <div class="op-exhibition__header">
            <?php
              $type = get_row_layout();
            if ($type == 'previus' ):
               pll_e( 'Volt' );
            elseif($type == 'actual'):
              pll_e( 'Most' );
            elseif($type == 'future'):
              pll_e( 'Majd' );
            endif;
            ?>
          </div>
          <div class="op-exhibition__title"><a href="<?php echo the_sub_field('link') ?>"><?php echo the_sub_field('title') ?></a></div>
          <div class="op-exhibition__location"><?php echo the_sub_field('location') ?></div>
          <div class="op-exhibition__date"><?php echo the_sub_field('date_opening') ?> - <?php echo the_sub_field('date_end') ?></div>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>
</div>
<div class="op-content__rightside">
<?php get_template_part('templates/slider', 'template'); ?>
</div>
<?php  get_footer(); ?>

