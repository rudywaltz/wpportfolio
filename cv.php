<?php /* Template Name: CV */ ?>

<?php get_header(); ?>
  <section id="content" role="main">
    <div class="row">
      <div class="sidebar">
        <div class="profile">
          <img class="profile__img" src="<?php echo get_field( 'picture' )['sizes']['medium'] ?>">
        </div>
      </div>

      <div class="main">
        <h2><?php echo get_field( 'name' ) ?></h2>
        <h3><?php echo get_field( 'email' ) ?></h3>
        <h3><?php echo get_field( 'description' ) ?></h3>
      </div>
    </div>
    <?php $featured_items = get_field( 'solo_exhibition' ); ?>
    <?php if ( ! empty( $featured_items ) ) : ?>
      <?php foreach ( $featured_items as $data ) : ?>
        <h3><?php echo $data['year'] ?></h3>
        <table cellpadding="5px">
          <?php foreach ( $data['data'] as $loop ) : ?>
                <tr>
                  <td><?php echo $loop['title']?></td>
                  <td><?php echo $loop['gallery']?></td>
                  <td><?php echo $loop['city']?></td>
                  <td><?php echo $loop['link']?></td>
                </tr>
        <?php endforeach; ?>
        </table>
      <?php endforeach; ?>
    <?php endif; ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="header">
          <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
        </header>
        <section class="entry-content">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
          <?php the_content(); ?>
          <div class="entry-links"><?php wp_link_pages(); ?></div>
        </section>
      </article>
      <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
  </section>

<?php get_footer(); ?>
