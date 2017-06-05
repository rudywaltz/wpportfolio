<header id="header" role="banner" class="op-header">
    <div id="site-title"><img src="<?php echo get_template_directory_uri() .'/images/logo.jpg';?>" alt="" class="op-logo"></div>
  <nav id="menu" role="navigation" class="op-navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
  </nav>
  <?php if(function_exists(pll_the_languages)) : ?>
    <ul class="op-langselector"><?php pll_the_languages(array('show_flags'=>0,'show_names'=>1)); ?></ul>
  <?php endif; ?>

</header>
<?php //get_template_part( 'templates/nav'); ?>
