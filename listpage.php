<?php /* Template Name: List */ ?>

<?php get_header('simple'); ?>
<div class="op-content__rightside">
  <?php get_template_part( 'templates/nav', 'menu'); ?>
  <div class="op-pagelist">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php $posts = get_posts(array('posts_per_page' => -1, 'post_type' => 'page')); ?>
      <?php $children = get_page_children($post->ID, $posts); ?>
      <?php foreach ($children as $child): ?>
        <?php if ($child->post_parent == $post->ID): ?>
          <a  href="<?php echo $child->guid; ?>" class="op-box" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($child->ID)); ?>') ">
            <div class="op-box__capture">
              <h3><?php echo $child->post_title; ?></h3>
              <span class="op-box__cta">
                <?php  if(function_exists('pll_e')) { pll_e( 'Megnéz' ); } ?>
              </span>
            </div>
          </a>
          <?php endif; ?>
      <?php endforeach; ?>
    <?php endwhile; endif; ?>
  </div>
</div>

<?php get_footer(); ?>
