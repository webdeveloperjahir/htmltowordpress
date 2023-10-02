<?php /*Template Name: Services Page*/ get_header(); ?>
<section id="company-information" class="choose">
    <div class="container">
        <?php 
        $query=new WP_Query(
            array( 'post_type'=> 'services', // name of post type. 
            'tax_query' => array( array( 'taxonomy' => 'service_cat', // taxonomy name 
            'field' => 'slug', // which one term_id, slug or name 
            'terms' => 'featured', // term id, term slug name or term name
             ) ) )); 
             while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
             ?>
        <div class="row">
            <div class="col-sm-6 wow fadeInDown img-responsive" data-wow-duration="1000ms" data-wow-delay="0ms"> <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""> </div>
            <div class="col-sm-6 padding-top wow fadeInDown choose_us" data-wow-duration="1000ms" data-wow-delay="0ms">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ 
        wp_reset_query(); ?> </div>
</section>
<!--/#company-information-->
<section id="services">
    <div class="container">
        <div class="row">
            <?php $query=new WP_Query(
                array( 'post_type'=> 'services', // name of post type. 
                'posts_per_page' => 6 ));
                 while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                 ?>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms"> <img src="<?php echo the_post_thumbnail_url(); ?>" alt=""> </div>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?>
            <div class="single-service">
                <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms"> <img src="<?php echo get_template_directory_uri(); ?>/images/services/3.png" alt=""> </div>
                <h2>Swift Page Builder</h2>
                <p>Venison tongue, salami corned beef ball tip meatloaf bacon. Fatback pork belly bresaola tenderloin bone pork kevin shankle.</p>
            </div>
        </div>
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
<section id="recent-projects" class="recent-projects">
    <div class="container">
        <div class="row">
            <h1 class="title text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">Recent Projects</h1>
            <p class="text-center padding-bottom wow fadeInDown" data-wow-duration="400ms" data-wow-delay="400ms">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                <br> Ut enim ad minim veniam, quis nostrud </p>
            <?php $query=new WP_Query(
                array( 'post_type'=> 'portfolios', // name of post type. 
                'posts_per_page' => 8 )); 
                $delay = 300; 
                while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                ?>
            <div class="col-sm-3 col-xs-6 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="<?php echo $delay; ?>ms">
                <div class="portfolio-wrapper">
                    <div class="portfolio-single">
                        <div class="portfolio-thumb"> <img src="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'second_featured_image', true) , 'full'); ?>" class="img-responsive" alt=""> </div>
                        <div class="portfolio-view">
                            <ul class="nav nav-pills">
                                <li><a href="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'third_featured_image', true) , 'full'); ?>" data-lightbox="example-set"><i class="fa fa-eye"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="portfolio-info">
                        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>
            </div>
            <?php 
            $delay=$delay + 100; 
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>
        </div>
    </div>
</section>
<!--/#recent-projects-->
<section id="clients">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <p><img src="<?php echo get_template_directory_uri(); ?>/images/home/clients.png" class="img-responsive" alt=""> </p>
                    <h1 class="title">Happy Clients</h1>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        <br> Ut enim ad minim veniam, quis nostrud </p>
                </div>
                <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <?php $query=new WP_Query(
                        array( 'post_type'=> 'clients', // name of post type. 
                        'posts_per_page' => 6 )); 
                        while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                        ?>
                    <div class="col-xs-3 col-sm-2"> <a href="#"><img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt=""></a> </div>
                    <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?> </div>
            </div>
        </div>
    </div>
</section>
<!--/#clients-->
<?php get_footer(); ?>
