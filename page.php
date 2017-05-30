<?php wp_enqueue_script( 'baguette_box', get_template_directory_uri() . '/js/baguetteBox.min.js', false, 1.8, true); ?>
<?php get_header(); ?>
<section id="content" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php $BannerImage =
        empty(get_field( 'banner' )) ?
            wp_get_attachment_image_src(get_post_thumbnail_id ($post->ID), 'xlarge')[0] :
            get_field( 'banner' )['sizes']['xlarge'] ?>
    <div class="op-lead" style="background-image: url(<?php echo $BannerImage; ?>);">
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
            <a href="<?php echo $image['sizes']['xlarge']; ?>" class="op-thumbnail" data-caption="<?php echo $image['title'] . ' | ' . $image['caption']; ?>" >
              <div class="op-thumbnail__wrap">
                <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['title']; ?>" class="op-thumbnail__image" />
              </div>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
