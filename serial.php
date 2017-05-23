<?php /* Template Name: Serial */ ?>

<?php wp_enqueue_script( 'baguette_box', get_template_directory_uri() . '/js/baguetteBox.min.js', false, 1.8, true); ?>
<?php get_header(); ?>
<section id="content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="op-lead" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id ($post->ID)) ?>);">
      <div class="op-lead__title">
        <h2><?php the_title(); ?></h2>
      </div>
    </div>

    <div class="op-pagecontent">
      <div class="op-description">
        <?php the_content(); ?>
      </div>
      <div class="op-gallery">
        <?php
        $images = get_field('gallery');
        if( $images ): ?>
            <?php foreach( $images as $image ): ?>
                <a href="<?php echo $image['url']; ?>" class="op-thumbnail">
                  <div class="op-thumbnail__wrap">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" data-caption="zsafol" class="op-thumbnail__image" />
                  </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
