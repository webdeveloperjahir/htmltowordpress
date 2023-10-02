<?php get_header('home');?>
<?php if( have_posts() ) the_post();//for showing author name and cat and comment in single.php put it at the top ?>
<section id="blog-details" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="single-blog blog-details two-column">
                            <div class="post-thumb">
                                <a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog/7.jpg" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#"><?php the_time( 'j' );?> <br><small><?php the_time( 'M' );?></small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="#"><?php the_title();?></a></h2>
                                <h3 class="post-author"><a href="#">Posted by <?php echo get_the_author();?></a></h3>
                                <?php the_content();?>
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
                                
                                <div class="blog-share">
                                    <span class='st_facebook_hcount'></span>
                                    <span class='st_twitter_hcount'></span>
                                    <span class='st_linkedin_hcount'></span>
                                    <span class='st_pinterest_hcount'></span>
                                    <span class='st_email_hcount'></span>
                                </div>
                                <div class="author-profile padding">
                                    <div class="row">
                                        <?php if (get_the_author_meta('description')) { // Checking if the user has added any author descript or not. If it is added only, then lets move ahead 
                                            ?>

                                        <div class="col-sm-2">
                                            <img src="<?php echo get_avatar_url(get_the_author_meta('user_email'), '100'); // Display the author gravatar image with the size of 100 ?>" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <h3><?php esc_html(the_author_meta('display_name')); // Displays the author name of the posts ?></h3>
                                            <p><?php esc_textarea(the_author_meta('description')); // Displays the author description added in Biographical Info ?></p>
                                            <span>Website:<a href="www.whiteweb.com"> www.whiteweb.com</a></span>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                </div>
                                <div class="response-area">
                                    <h2 class="bold">Comments</h2>
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="post-comment">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="<?php echo get_template_directory_uri();?>/images/blogdetails/2.png" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                        <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="parrent">
                                                <ul class="media-list">
                                                    <li class="post-comment reply">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" src="<?php echo get_template_directory_uri();?>/images/blogdetails/3.png" alt="">
                                                        </a>
                                                        <div class="media-body">
                                                            <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
                                                            <ul class="nav navbar-nav post-nav">
                                                                <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="post-comment">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="<?php echo get_template_directory_uri();?>/images/blogdetails/4.png" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                        <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>



                                    <?php if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

?>
                                </div>
                                <!--/Response-area-->
                            </div>
                        </div>
                    </div>
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
                            $current_post_cat = get_the_category();
                            //var_dump($current_post_cat);
                            foreach($current_post_cat as $cur_post_cat){
                            $current_post_cat_name = $cur_post_cat->name;
                            //echo $current_post_cat_name;
                            }
                            $args = array(
                                'post_type' => 'post'
                            );

                            $categories = get_categories( $args );
                            
                            $x=1;
                            foreach($categories as $cat){
                            ?>
                            <li class="<?php if ($cat->name == $current_post_cat_name){echo 'active';}?>"><a href="#"><?php echo  $cat->name;?><span class="pull-right">(<?php echo $cat->count;?>)</span></a></li>
                           
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
                            
                        <?php endwhile; /** * reset the orignal query * we should use this to reset wp_query */ wp_reset_query(); ?> </div>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#blog-->

<?php get_footer(); ?>
