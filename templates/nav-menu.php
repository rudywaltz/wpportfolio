<header id="header" role="banner" class="op-header">
    <div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } else { echo '<span class="h1">'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } else { echo '</span>'; } ?></div>
  <nav id="menu" role="navigation" class="op-navigation">
    <!--<div id="search">-->
    <?php //get_search_form(); ?>
    <!--</div>-->
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
  </nav>
  <?php // outputs a flags list (without languages names) ?>
  <ul class="op-langselector"><?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?></ul>

</header>
<?php //get_template_part( 'templates/nav'); ?>
