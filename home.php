<?php
/* Template Name: Home Page */

 get_header('home');
 

?>

<section id="home-slider">
    <div class="container">
        <div class="row">
           
           <?php 
		
		$query = new WP_Query( array(
    'post_type' => 'sliders',          // name of post type.
    'posts_per_page'=>1
) );

while ( $query->have_posts() ) : $query->the_post();
    // do stuff here....
	//echo var_dump($query);
	
	
	?>
           
            <div class="main-slider">
                <div class="slide-text">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <a href="#" class="btn btn-common">SIGN UP</a>
                </div>
                <img src="<?php echo get_template_directory_uri();?>/images/home/slider/hill.png" class="slider-hill" alt="slider image">
                <img src="<?php echo get_template_directory_uri();?>/images/home/slider/house.png" class="slider-house" alt="slider image">
                <img src="<?php echo get_template_directory_uri();?>/images/home/slider/sun.png" class="slider-sun" alt="slider image">
                <img src="<?php echo get_template_directory_uri();?>/images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                <img src="<?php echo get_template_directory_uri();?>/images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
            </div>
      <?php
endwhile;

/**
 * reset the orignal query
 * we should use this to reset wp_query
 */
wp_reset_query();

		?>
      
            
        </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
<!--/#home-slider-->

<section id="services">
    <div class="container">
        <div class="row">

            <?php 
		
		$query = new WP_Query( array(
    'post_type' => 'services',          // name of post type.
    'posts_per_page'=>3
) );

while ( $query->have_posts() ) : $query->the_post();
    // do stuff here....
	//echo var_dump($query);
	
	
	?>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="<?php echo the_post_thumbnail_url();?>" alt="">
                    </div>
                    <h2><?php the_title();?></h2>
                    <?php the_content();?>
                </div>
            </div>
            <?php
endwhile;

/**
 * reset the orignal query
 * we should use this to reset wp_query
 */
wp_reset_query();

		?>


        </div>
    </div>
</section>
<!--/#services-->

<section id="action" class="responsive">
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title"><?php echo get_theme_mod('cta_title');?></h1>
                        <p><?php echo get_theme_mod('cta_title_description_setting');?></p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="tour-button">
                            <a href="<?php echo get_theme_mod('cta_link_setting');?>" class="btn btn-common"><?php echo get_theme_mod('cta_link_text_setting');?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->

<section id="features">
    <div class="container">
        <div class="row">

            <?php $query=new WP_Query(
                array( 'post_type'=> 'post', // name of post type.
                      'posts_per_page'=>3,
                                'tax_query' => array( array( 'taxonomy' => 'category', // taxonomy name 
                                'field' => 'slug', // which one term_id, slug or name 
                                'terms' => 'featured', // term id, term slug name or term name
                                ) ) 
                     )); 
                $a = 1;
                $b = 2; 
             while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
             
                
                ?>
            <?php if( $a % $b == 1){?>
            <div class="single-features">
                <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="<?php the_post_thumbnail_url();?>" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php } else{ ?>

            <div class="single-features">
                <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                    <img src="<?php the_post_thumbnail_url();?>" class="img-responsive" alt="">
                </div>
            </div>
            <?php } ?>
            <?php 
            $a = $a + 1; 
                
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>

        </div>
    </div>
</section>
<!--/#features-->

<section id="clients">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <p><img src="<?php echo get_template_directory_uri();?>/images/home/clients.png" class="img-responsive" alt=""></p>
                    <h1 class="title">Happy Clients</h1>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim veniam, quis nostrud </p>
                </div>
                <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <?php $query=new WP_Query(
                        array( 'post_type'=> 'clients', // name of post type. 
                        'posts_per_page' => 6 )); 
                        while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                        ?>
                    <div class="col-xs-3 col-sm-2"> <a href="#"><img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a> </div>
                    <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#clients-->

<?php get_footer();?>

