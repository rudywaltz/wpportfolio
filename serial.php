<?php /* Template Name: Serial */ ?>

<?php get_header(); ?>
<section id="content" role="main">
  <?php
    $images = get_field('gallery');
    if( $images ): ?>
  <ul>
    <?php foreach( $images as $image ): ?>
      <li>
        <a href="<?php echo $image['url']; ?>">
          <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
        </a>
        <ul>
          <li><?php echo $image['title']; ?></li>
          <li><?php echo $image['alt']; ?></li>
          <li><?php echo $image['description']; ?></li>
          <li><?php echo $image['caption']; ?></li>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
