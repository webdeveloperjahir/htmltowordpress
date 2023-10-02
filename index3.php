<?php get_header(); ?>


<!--/#action-->

<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                   <?php // exclude posts in gallery category
                $catid = get_cat_ID('featured');
                    $ourCurrentPage = get_query_var('paged');
                $args = array(
                    'post_type' =>'post',
                    'cat'       => '-' . $catid,
                    'paged'     =>$ourCurrentPage,
                     
                             );
                    
                $the_query = new WP_Query( $args );                    

                if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
                    <div class="col-md-6 col-sm-12 blog-padding-right">
                        <div class="single-blog two-column">
                            <div class="post-thumb">
                                <a href="<?php echo the_permalink();?>"><img src="<?php echo the_post_thumbnail_url();?>" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#"><?php the_time( 'j' );?> <br><small><?php the_time( 'M' );?></small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h2>
                                <h3 class="post-author"><a href="#">Posted by <?php the_author();?></a></h3>
                                <p><?php the_excerpt();?></p>
                                <a href="<?php the_permalink();?>" class="read-more">View More</a>
                                <div class="post-bottom overflow">
                                    <ul class="nav nav-justified post-nav">
                                    <?php $my_post_category = get_the_category( get_the_ID() );
                                        foreach ( $my_post_category as $cat_name) {?>
                                            
                                            <li><a href="#"><i class="fa fa-tag"></i><?php echo $cat_name->name; ?></a></li>
                                            <?php  } ?>
                                        
                                        <li><a href="#"><i class="fa fa-heart"></i><?php echo ip_get_like_count('likes') ?> Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i>
                                   <?php comments_number('No Comment', '1 Comment', '% Comments');?> 
                                             </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php //endwhile; ?>
            <?php //endif; ?>
                    
                
                
                
               <?php endwhile; ?>
      
              <div class='pagination'>
    <?php previous_posts_link('%link', '<span>Previous</span>', TRUE); ?>
    <?php next_posts_link('%link', '<span>Next</span>', TRUE); ?>
</div>
            
                
            <?php endif;  ?>
                
                </div>
                                   
<div class="blog-pagination">
                    <ul class="pagination">
                        <li><a href="#">left</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">right</a></li>
                    </ul>
                    

  

                </div>
                
                
            </div>



            <div class="col-md-3 col-sm-5">
                <div class="sidebar blog-sidebar">
                    <div class="sidebar-item  recent">
                        <h3>Comments</h3>
                        <?php
                        $latest_comments_args = array(
                        //'status'=>'approve',
                        'order'=>'DESC',
                        'number'=>3
                        );
                        
                        $latest_comments_query= new WP_Comment_Query();
                        $comments = $latest_comments_query->query($latest_comments_args);
                        if($comments){
                            
                            //var_dump($comments);
                            foreach($comments as $comment){
                        ?>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#"><img src="<?php 
                                $Commentor_email=$comment->comment_author_email;
                                
                                
                                echo get_avatar_url(get_the_author_meta('$Commentor_email'), '100'); // Display the author gravatar image with the size of 100 ?>" alt=""></a>
                            </div>
                            <div class="media-body">
                                <h4><a href="#">
                                   <?php $coment_text=$comment->comment_content;
                                    echo substr("$coment_text",0,14);// 14 is the no. of letter 
                                    ?></a></h4>
                                <p>posted on 
                                <?php
                                $com_date=$comment->comment_date;
                                $date=date_create("$com_date");
                                echo date_format($date,"d F Y");                                
                                ?>
                                </p>
                            </div>
                            </div>
                        <?php } }else{
                            echo "No Comments Found";
                        } wp_reset_query(); ?>
                    </div>
                    <div class="sidebar-item categories">
                        <h3>Categories</h3>
                        <ul class="nav navbar-stacked">
                            <?php
                          
                            $args = array(
                                'post_type' => 'post'
                            );

                            $categories = get_categories( $args );
                            
                            $x=1;
                            foreach($categories as $cat){
                            ?>
                            <li class="<?php if ($x == 2){echo 'active';}?>"><a href="#"><?php echo  $cat->name;?><span class="pull-right">(<?php echo $cat->count;?>)</span></a></li>
                           
                            <?php $x++; }?>
                        </ul>
                    </div>
                    <div class="sidebar-item tag-cloud">
                        <h3>Tag Cloud</h3>
                        <ul class="nav nav-pills">
                            <?php
                            $post_tags = get_tags(array('get'=>'all'));
                            foreach( $post_tags as $tag) {

                            ?>
                            <li><a href="<?php echo get_term_link($tag);?>"><?php echo $tag->name;?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="sidebar-item popular">
                        <h3>Latest Photos</h3>
                        <ul class="gallery">
                            <?php $query=new WP_Query(
                        array( 'post_type'=> 'post', // name of post type. 
                        'posts_per_page' => 6 )); 
                        while ($query->have_posts()): $query->the_post(); // do stuff here.... //echo var_dump($query); 
                        ?>
                            <li><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url();?>" alt=""></a></li>
                            
                        <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#blog-->

<?php get_footer(); ?>
