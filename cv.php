<?php /* Template Name: CV */ ?>

<?php get_header(); ?>
  <section id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="op-cvheader">
      <div class="op-cvheader__sidebar">
        <div class="op-profile">
          <?php if(!empty(get_field( 'picture' ))) : ?>
            <img class="op-profile__image" src="<?php echo get_field( 'picture' )['sizes']['medium'] ?>">
          <?php endif;?>
        </div>
      </div>
      <div class="op-cvheader__main">
        <h2><?php echo get_field( 'name' ) ?></h2>
        <h3><?php echo get_field( 'email' ) ?></h3>
        <h3><?php echo get_field( 'description' ) ?></h3>
      </div>
    </div>
    <table class="op-table">
      <?php $educations = get_field( 'education' ); ?>
      <?php if ( ! empty( $educations ) ) : ?>
        <tr>
          <th width="240px" align="left" class="group"><?php pll_e( 'Tanulmányok' ) ?></th>
        <th></th>
        </tr>
        <?php foreach ( $educations as $data ) : ?>
            <tr>
              <td></td>
              <td class="date"><?php echo $data['year']?></td>
            </tr>
          <tr>
              <td></td>
              <td class="data"><?php echo $data['school']?></td>
            </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      <?php $featured_items = get_field( 'solo_exhibition' ); ?>
      <?php if ( ! empty( $featured_items ) ) : ?>
        <tr>
        <th width="240px" align="left" class="group"><?php pll_e( 'Önálló Kiállítások' ) ?></th>
        <th></th>
        </tr>
        <?php foreach ( $featured_items as $data ) : ?>
            <?php require('templates/cv-table.php') ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php $featured_items_group = get_field( 'group_exhibition' ); ?>
      <?php if ( ! empty( $featured_items_group ) ) : ?>
        <tr>
        <th width="240px" align="left" class="group"><?php pll_e( 'CSoportos Kiállítások' ) ?></th>
        <th></th>
        </tr>
        <?php foreach ( $featured_items_group as $data ) : ?>
          <?php require('templates/cv-table.php') ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php $prize = get_field( 'prize' ); ?>
      <?php if ( ! empty( $prize ) ) : ?>
        <tr>
          <th width="240px" align="left" class="group"><?php pll_e( 'Díjak' ) ?></th>
          <th></th>
        </tr>
        <?php foreach ( $prize as $data ) : ?>
          <tr>
            <td></td>
            <td class="date"><?php echo $data['year']?></td>
          </tr>
          <?php if ( ! empty( $data['data'] ) ) : ?>
            <?php foreach ( $data['data'] as $data2 ) : ?>
              <tr>
                <td></td>
                <td class="data"><?php echo $data2['name']?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>


      <?php $membership = get_field( 'membership' ); ?>
      <?php if ( ! empty( $membership ) ) : ?>
        <tr>
          <th width="240px" align="left" class="group"><?php pll_e( 'Tagság' ) ?></th>
          <th></th>
        </tr>
        <?php foreach ( $membership as $data ) : ?>
          <tr>
            <td></td>
            <td class="date"><?php echo $data['year']?></td>
          </tr>
          <tr>
            <td></td>
            <td class="data"><?php echo $data['membership']?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
    <?php endwhile; endif; ?>
  </section>

<?php get_footer(); ?>
