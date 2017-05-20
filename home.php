<?php /* Template Name: Home */ ?>
<?php get_header('simple'); ?>
<div class="op-content__leftside">
  <?php get_template_part( 'templates/nav', 'menu'); ?>
  <ul class="op-exhibitionlist">
    <li class="op-exhibitonlist__details op-exhibitonlist__details-prev op-exhibition">
      <div class="op-exhibition__header">header</div>
      <div class="op-exhibition__title">Title</div>
      <div class="op-exhibition__date">date</div>
    </li>
  </ul>
</div>
<div class="op-content__rightside">
<?php get_template_part('templates/slider', 'template'); ?>
</div>
<?php  get_footer(); ?>

