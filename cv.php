<?php /* Template Name: CV */ ?>

<?php get_header(); ?>
<ul><?php pll_the_languages();?></ul>
<br>
  <section id="content" role="main">
    <?php $featured_items = get_field( 'solo_exhibition' ); ?>
    <?php var_dump($featured_items) ?>
    <?php if ( ! empty( $featured_items ) ) : ?>
      <?php foreach ( $featured_items as $data ) : ?>
        <br>
        <br>
        <h3><?php echo $data['evek'] ?></h3>
        <table cellpadding="5px">
          <?php foreach ( $data['adatok'] as $loop ) : ?>
                <tr>
                  <td><?php echo $loop['cim']?></td>
                  <td><?php echo $loop['galleria']?></td>
                  <td><?php echo $loop['helyszin']?></td>
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
