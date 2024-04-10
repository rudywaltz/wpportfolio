<?php /* Template Name: Gallery */ ?>

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
    <div class="js-gallery op-thumbnails">
    <?php
      $gallery = get_field('image_list');
      if($gallery):
    ?>
      <?php foreach($gallery as $galleryItem): ?>

        <?php
          $galleryTitle = $galleryItem['title'];
          $galleryImage = $galleryItem['image'];
          $hidden = $galleryItem['hidden'];
          $dimension = $galleryItem['height'] && $galleryItem['width'] ? $galleryItem['height'] . 'x' . $galleryItem['width'] . ' cm, ' : '';

          $title = '<strong>' . $galleryTitle .'</strong>';
          $details = $galleryItem['year'] . ', ' . $dimension  . $galleryItem['material'];
        ?>
          <?php if($hidden): ?>
            <a href="<?=$galleryImage['sizes']['xlarge'] ?>" data-caption="<?= $title ?>, <?= $details ?>"></a>
          <?php else: ?>
            <figure>
              <a href="<?=$galleryImage['sizes']['xlarge'] ?>" data-caption="<?= $title ?>, <?= $details ?>">
                  <img src="<?=$galleryImage['sizes']['large'] ?>" alt="<?= $galleryTitle ?>" class="op-thumbnails__image op-thumbnails__image--<?= $galleryItem['size'] ?>" />
              </a>
              <figcaption class="op-thumbnails__title"><?= $title ?> <br> <?= $details ?></figcaption>
            </figure>
          <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
    </div>
  <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>
