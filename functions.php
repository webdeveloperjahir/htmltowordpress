<?php
/*https://www.duplichecker.com/php-formatter*/
function triangle_theme_setup()
{
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails", [
        "post",
        "page",
        "services",
        "clients",
        "sliders",
        "testimonials",
        "portfolios",
        "team",
    ]);
    add_image_size("service-feature", 600, 500, true);
    add_image_size("portfolio_sidebar", 55, 55, true);
    add_image_size("post_image_sidebar", 65, 65, true);
    load_theme_textdomain("triangle", get_template_directory() . "/languages");
    register_nav_menus([
        "primary_menu" => __("Primary Menu", "triangle"),
        "footer_menu" => __("Footer Menu", "triangle"),
    ]);
}
add_action("after_setup_theme", "triangle_theme_setup");

require get_template_directory().'/incl/customizer_with_many_input.php';
new triangle_customizer();


//widget

function triangle_widget_areas()
{
    //footer widget start
    register_sidebar([
        "name" => __("Footer_One", "triangle"),
        "id" => "footer_one",
        "description" => __("This widget will display Footer One", "triangle"),
        "before_widget" => '<div class="testimonial bottom">',
        "after_widget" => "</div>",
    ]);

    register_sidebar([
        "name" => __("Footer_Two", "triangle"),
        "id" => "footer_two",
        "description" => __("This widget will display Footer Two", "triangle"),
        "before_widget" => '<div class="contact-info bottom">',
        "after_widget" => "</div>",
    ]);
    register_sidebar([
        "name" => __("Footer_Three", "triangle"),
        "id" => "footer_three",
        "description" => __(
            "This widget will display Footer Three",
            "triangle"
        ),
        "before_widget" => '<div class="contact-form bottom">',
        "after_widget" => "</div>",
    ]);
    //footer widget end
}
add_action("widgets_init", "triangle_widget_areas");

//custom post call from incl
require get_template_directory() . "/incl/all_custom_post.php";
require get_template_directory() . "/incl/all_custompost_texonomy.php";

function triangle_theme_scripts()
{
    wp_enqueue_style(
        "bootstrap", get_template_directory_uri() . "/css/bootstrap.min.css"
    );
    wp_enqueue_style(
        "font-awesome",get_template_directory_uri() . "/css/font-awesome.min.css"
    );
    wp_enqueue_style(
        "animate", get_template_directory_uri() . "/css/animate.min.css"
    );
    wp_enqueue_style(
        "lightbox", get_template_directory_uri() . "/css/lightbox.css"
    );
    wp_enqueue_style("main", get_template_directory_uri() . "/css/main.css");
    wp_enqueue_style("style", get_template_directory_uri() . "/style.css");
    wp_enqueue_style(
        "responsive", get_template_directory_uri() . "/css/responsive.css"
    );

    wp_enqueue_script(
        "jquery", get_template_directory_uri() . "/js/jquery.js",[],"1.0.0",true
    );
    wp_enqueue_script(
        "bootstrap",get_template_directory_uri() . "/js/bootstrap.min.js",[],"1.0.0",true
    );
    wp_enqueue_script(
        "lightbox", get_template_directory_uri() . "/js/lightbox.min.js",[],"1.0.0",true
    );
    wp_enqueue_script(
        "isotope",get_template_directory_uri() . "/js/jquery.isotope.min.js",[],"1.0.0",true
    );
    wp_enqueue_script(
        "wow",get_template_directory_uri() . "/js/wow.min.js",[],"1.0.0",true
    );
    //like it
    wp_enqueue_script(
        "like_it",get_template_directory_uri() . "/js/like_it.js",[],"1.0.0",true
    );
    
    
    wp_enqueue_script(
        "main",get_template_directory_uri() . "/js/main.js",[],"1.0.0",true
    );
   
}
add_action("wp_enqueue_scripts", "triangle_theme_scripts");

require get_template_directory() . "/incl/double_thumbnail_image.php";
require get_template_directory() . "/incl/better-comments.php";
//popular post

/*
 * Related post of custom post type
 */
// Create a query for the custom taxonomy
function related_posts_by_taxonomy( $post_id, $taxonomy, $args=array() ) {
    $query = new WP_Query();
    $terms = wp_get_object_terms( $post_id, $taxonomy );

    // Make sure we have terms from the current post
    if ( count( $terms ) ) {
        $post_ids = get_objects_in_term( $terms[0]->term_id, $taxonomy );
        $post = get_post( $post_id );
        $post_type = get_post_type( $post );

        // Only search for the custom taxonomy on whichever post_type
        // we AREN'T currently on
        // This refers to the custom post_types you created so
        // make sure they are spelled/capitalized correctly
        //if ( strcasecmp($post_type, 'locations') == 0 ) {
          //  $type = 'videos';
        //} else {
           // $type = 'locations';
        //}

        $args = wp_parse_args( $args, array(
                'post_type' => $post_type,
                'post__in' => $post_ids,
                'taxonomy' => $taxonomy,
                'term' => $terms[0]->slug,
            ) );
        $query = new WP_Query( $args );
    }

    // Return our results in query form
    return $query;
}

//pagination// Numbered Pagination



//like system

	//---- Add buttons to top of post content
	function ip_post_likes($content) {
		// Check if single post
		if(is_singular('post')) {
			ob_start();

			?>
<ul class="nav nav-justified post-nav">

    <li><a href="<?php echo add_query_arg('post_action', 'like'); ?>"><i class="fa fa-heart"></i>Love It</a></li>

</ul>


<?php

			$output = ob_get_clean();

			return $output . $content;
		}else {
			return $content;
		}
	}

	add_filter('the_content', 'ip_post_likes');

	//---- Get like or dislike count
	function ip_get_like_count($type = 'likes') {
		$current_count = get_post_meta(get_the_id(), $type, true);

		return ($current_count ? $current_count : 0);
	}

	//---- Process like or dislike
	function ip_process_like() {
		$processed_like = false;
		$redirect       = false;

		// Check if like or dislike
		if(is_singular('post')) {
			if(isset($_GET['post_action'])) {
				if($_GET['post_action'] == 'like') {
					// Like
					$like_count = get_post_meta(get_the_id(), 'likes', true);

					if($like_count) {
						$like_count = $like_count + 1;
					}else {
						$like_count = 1;
					}

					$processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
				}elseif($_GET['post_action'] == 'dislike') {
					// Dislike
					$dislike_count = get_post_meta(get_the_id(), 'dislikes', true);

					if($dislike_count) {
						$dislike_count = $dislike_count + 1;
					}else {
						$dislike_count = 1;
					}

					$processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
				}

				if($processed_like) {
					$redirect = get_the_permalink();
				}
			}
		}

		// Redirect
		if($redirect) {
			wp_redirect($redirect);
			die;
		}
	}

	add_action('template_redirect', 'ip_process_like');
?>
