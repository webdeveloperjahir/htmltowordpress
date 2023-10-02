
<?php get_header(); ?>
       
    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
               
               
             

                <div class="col-sm-6">
                    <img src="<?php echo get_template_directory_uri();?>/images/portfolio-details/1.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <h2 class="bold"><?php the_title();?></h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-clock-o"></i><?php the_time( 'F j, Y' ); ?></a></li>
                            
<?php
$postID = get_the_ID();                                
                            
$getPortfolioCat = get_the_terms( $postID, 'portfolio_cat' ); //as it's returning an array
if($getPortfolioCat){
foreach ( $getPortfolioCat as $portfolioCat ) {
    ?>
    <li><a href="<?php echo get_term_link($portfolioCat->slug, 'portfolio_cat') ?>"><i class="fa fa-tag"></i>
    <?php
    echo $portfolioCat->name ." ";
    ?>
    </a></li>

<?php 
    
} } ?> 
                            
                        </ul>
                    </div>
                    <div class="project-info overflow">
                        <h3>Project Info</h3>
                        <p><?php echo get_field('project_info');?></p>
                        
                    </div>
                    <div class="skills overflow">
                        <h3>Skills:</h3>
                        <ul class="nav navbar-nav navbar-default">
                           
<?php
$skills = get_field('skills');
if( $skills ){ ?>
    <?php foreach( $skills as $skill ){?>
       <li><a href="#"><i class="fa fa-check-square"></i><?php echo $skill; ?></a></li>
<?php }} ?>
                            
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Client:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-bolt"></i><?php echo get_field('clients');?></a></li>
                        </ul>
                    </div>
                    <div class="live-preview">
                        <a href="<?php echo get_field('live_link'); ?>" class="btn btn-common uppercase">Live preview</a>
                    </div>
                </div>
                
                                


 
        </div>
    </section>
     <!--/#portfolio-information-->

       
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <h1 class="title text-center">Related Work</h1>
<?php $related =  related_posts_by_taxonomy( $postID, 'portfolio_cat' );
    while ( $related->have_posts() ): $related->the_post(); ?>
        
    


                <div class="col-sm-3">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-single">
                            <div class="portfolio-thumb">
                                <img src="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'second_featured_image', true) , 'full'); ?>" class="img-responsive" alt="">
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    <li><a href="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'third_featured_image', true) , 'full'); ?>" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-info ">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                        </div>
                    </div>
                </div>
    <?php endwhile; ?>         
                
            </div>
        </div>
    </section>
   
    <!--/#related-work-->

<?php get_footer();?>