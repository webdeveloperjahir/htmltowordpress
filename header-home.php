<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Triangle</title>


    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri();?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri();?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri();?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri();?>/images/ico/apple-touch-icon-57-precomposed.png">
    <?php wp_head(); ?>
</head>
<!--/head-->

<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                    <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href="<?php echo get_theme_mod('socialLinks_facebook');?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo get_theme_mod('socialLinks_twitter');?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo get_theme_mod('socialLinks_googlePlus');?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo get_theme_mod('socialLinks_dribble');?>"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="<?php echo get_theme_mod('socialLinks_linkedIn');?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php echo bloginfo('home');?>">
                        <h1><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <?php
					if (function_exists('wp_nav_menu')) {
wp_nav_menu(array('theme_location' => 'primary_menu', 'container' => 'ul','menu_class' => 'nav navbar-nav navbar-right'));
					}
					
					?>


                </div>
                <div class="search">
                    <form role="form" method="GET" action="<?php esc_url(bloginfo('home'));?>">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search" name="s">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
