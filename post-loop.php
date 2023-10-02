
                    <?php // exclude posts in gallery category
                               

                if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

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
                   
                
                <?php endwhile;?>
                </div>
                
                <?php endif;  ?>