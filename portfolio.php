<?php
/* Template Name: Portfolio Page */

 get_header();?>


<section id="projects">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <ul class="portfolio-filter text-center">
                        <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
                        <?php 
                            $portfolio_cats = get_terms('portfolio_cat');
                            
                           
                            foreach ($portfolio_cats as $portfolio_cat){
                            ?>
                        <li><a class="btn btn-default" href="#" data-filter=".<?php echo $portfolio_cat->slug;?>"><?php echo $portfolio_cat->name;?></a></li>
                        <?php } ?>


                    </ul>
                    <!--/#portfolio-filter-->

                    <div class="portfolio-items">

                        <?php 
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            
                            $query=new WP_Query(
                                array( 'post_type'          => 'portfolios', // name of post type. 
                                        'paged'             =>$paged,
                                        'posts_per_page'    =>3,
                                        'order'             => 'ASC')); 
               
                while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                ?>

                        <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item 
                    
                    <?php $portfolio_cats_slug = get_the_terms( $post->ID, 'portfolio_cat'); 
                   foreach  ($portfolio_cats_slug as $portfolio_cat_slug){
                       echo $portfolio_cat_slug->slug ;echo " ";
                   }?> ">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                    <div class="portfolio-thumb">
                                        <img src="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'second_featured_image', true) , 'full'); ?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="portfolio-view">
                                        <ul class="nav nav-pills">
                                            <li><a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a></li>
                                            <li><a href="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID() , 'third_featured_image', true) , 'full'); ?>" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="portfolio-info ">
                                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </div>
                            </div>
                        </div>

                        <?php 
            
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>


                    </div>

                </div>
                <div class="row">
                    
                    <div class="portfolio-pagination">

                    <?php echo paginate_links(array(
                    'total'=>$query->max_num_pages,
                        'base' => get_pagenum_link(1) . '%_%',
                    //'format' => '/page/%#%',
                    'current' => $paged,
                    //'total' => $total_pages,
                    'prev_text'    => __('«'),
                    'next_text'    => __('»'),
                    'type' => 'list'
                    ))
                    
                    ?>
                </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 padding-top">
                <div class="sidebar portfolio-sidebar">
                    <div class="sidebar-item categories">
                        <h3>Project Categories</h3>
                        <ul class="nav navbar-stacked">

                            <?php 
                            $portfolio_cats = get_terms('portfolio_cat');
                            
                            $x=1;
                            foreach ($portfolio_cats as $portfolio_cat){
                            ?>
                            <li class="<?php if ($x==2){echo 'active';}?>"> <a href="#"><?php echo $portfolio_cat->name;?><span class="pull-right">(<?php echo $portfolio_cat->count;?>)</span></a></li>
                            <?php  $x++ ;  ?>
                            <?php   } ?>


                        </ul>
                    </div>
                    <div class="sidebar-item  recent">
                        <h3>Recent Projects</h3>

                        <?php $query=new WP_Query(
                array( 'post_type'=> 'portfolios', // name of post type. 
                'posts_per_page' =>3 )); 
               
                while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                ?>
                        <div class="media">
                            <div class="pull-left">
                                <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt=""></a>
                            </div>
                            <div class="media-body">
                                <h4><a href="<?php the_permalink();?>"><?php the_content();?></a></h4>
                                <p>posted on <?php the_time( 'j M, Y' ); ?></p>
                            </div>
                        </div>
                        <?php 
            
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>

                    </div>
                    <div class="sidebar-item popular">
                        <h3>Popular Projects</h3>
                        <ul class="gallery">

                            <?php
                              //Set the parameters / arguments for the query
$popular_post_args = array(
    'post_type'=> 'portfolios', // name of post type. 
                'posts_per_page' =>3
);
 
//Initialise the Query and add the arguments
$popular_posts = new WP_Query( $popular_post_args );
        
            while ( $popular_posts->have_posts() ) : $popular_posts->the_post();
            ?>


                            <li><a href="#"><img src="<?php the_post_thumbnail_url();?>" alt=""></a></li>

                            <?php 
            
            endwhile; /** * reset the orignal query * we should use this to reset wp_query */
             wp_reset_query(); 
             ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#projects-->

<?php get_footer();?>
