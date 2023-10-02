<?php 
/*Template Name: About Us*/
get_header();
?>
<section id="company-information" class="padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="row">
           
            <div class="col-sm-6">
                <img src="<?php echo get_theme_mod('aboutus_link_setting');?>" class="img-responsive" alt="">
            </div>
            <div class="col-sm-6 ">
                <?php echo nl2br( get_theme_mod('aboutus_title_description_setting') );?>
                
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
           <?php $query=new WP_Query(
                array( 'post_type'=> 'services', 
                'posts_per_page' => 3 ));
                $delay = 300;
                 while ($query->have_posts()): $query->the_post(); 
                 ?>
            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="<?php echo $delay; ?>ms">
                <div class="single-service">
                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="<?php echo $delay; ?>ms">
                        <img src="<?php the_post_thumbnail_url();?>" alt="">
                    </div>
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php 
            $delay = $delay + 300; 
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?>
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

<section id="team">
    <div class="container">
        <div class="row">
            <h1 class="title text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">Meet the Team</h1>
            <p class="text-center wow fadeInDown" data-wow-duration="400ms" data-wow-delay="400ms">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
                Ut enim ad minim veniam, quis nostrud </p>
            <div id="team-carousel" class="carousel slide wow fadeIn" data-ride="carousel" data-wow-duration="400ms" data-wow-delay="400ms">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#team-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#team-carousel" data-slide-to="1"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                       <?php $query=new WP_Query(
                array( 'post_type'=> 'team', // name of post type. 
                'posts_per_page' =>4 )); 
                
                while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                ?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="social-profile">
                                        <ul class="nav nav-pills">
                                            <li><a href="<?php the_field('facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php the_field('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php the_field('google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="person-info">
                                    <h2><?php the_title();?></h2>
                                    <p><?php the_field('title'); ?></p>
                                </div>
                            </div>
                        </div>
                      <?php 
            
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>  
                        
                    </div>
                    <div class="item">
                       
                       
                        <?php $query=new WP_Query(
                array( 'post_type'=> 'team', // name of post type. 
                'posts_per_page' =>4 )); 
                
                while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                ?>
                        <div class="col-sm-3 col-xs-6">
                            <div class="team-single-wrapper">
                                <div class="team-single">
                                    <div class="person-thumb">
                                        <img src="<?php echo the_post_thumbnail_url(); ?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="social-profile">
                                        <ul class="nav nav-pills">
                                            <li><a href="<?php the_field('facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php the_field('twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php the_field('google_plus'); ?>"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="person-info">
                                    <h2><?php the_title();?></h2>
                                    <p><?php the_field('title'); ?></p>
                                </div>
                            </div>
                        </div>
                      <?php 
            
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>  
                        
                  
                        
                    </div>
                </div>

                <!-- Controls -->
                <a class="left team-carousel-control hidden-xs" href="#team-carousel" data-slide="prev">left</a>
                <a class="right team-carousel-control hidden-xs" href="#team-carousel" data-slide="next">right</a>
            </div>
        </div>
    </div>
</section>
<!--/#team-->

<?php get_footer();?>
