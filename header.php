<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161937152-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-161937152-2');
    </script>
</head>

<body <?php body_class(); ?>>

<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <?php 
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          if ( has_custom_logo() ) {
        ?> 
          <a href="<?php echo get_bloginfo('url'); ?>" class="navbar-brand">
            <img class="logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php esc_html_e(get_bloginfo( 'name' )); ?>" />
            <div class="title"><?php esc_html_e(get_bloginfo('description')); ?></div>
          </a>
          <?php 
        } else if(get_bloginfo( 'name' ) != null) { ?>
            <h1><?php echo esc_html_e( bloginfo( 'name' ), 'n8astro' ) ?></h1>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'best-reloaded' ); ?>">
          <span class="navbar-toggler-icon"><span class="sr-only"><?php esc_html_e( 'Toggle Navigation', 'n8astro' ); ?></span></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse" role="navigation" aria-label="Header Menu">
        <?php wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'depth' => 2,
            'container' => 'div',
            'container-class' => 'collapse navbar-collapse',
            'container-id' => 'header-menu-container',
            'menu_class' => 'nav navbar-nav navbar-right mr-auto',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker()
        )); ?>
        </div>
        <!-- <ul class="nav navbar-nav navbar-right mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">主頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about-us">關於我們</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/healthy-living">健康生活</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact-us">聯絡我們</a>
          </li>
        </ul> -->
      <!-- <form className="form-inline mt-2 mt-md-0">
        <input className="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" />
        <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </nav>
  </header>