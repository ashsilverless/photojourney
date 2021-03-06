<?php
/**
 * photojourney functions and definitions
 *
 * @package Photo Journey
 */

remove_action('wp_head', 'print_emoji_detection_script', 7);

remove_action('wp_print_styles', 'print_emoji_styles');

/** = Enqueue scripts and styles. Another just for the dev branch. = */
function photojourney_scripts() {
	wp_enqueue_style( 'photojourney-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sl-core-js', get_template_directory_uri() . '/js/compiled.js', array('jquery'), true);

    wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), true);

    	wp_enqueue_script( 'photojourney-mixitup-filter', get_template_directory_uri() . '/js/mixitup.js', true );

}
add_action( 'wp_enqueue_scripts', 'photojourney_scripts' );

//** Add Owl Carousel Assets

function sl_owl_assets() {
	//load owl js
	wp_enqueue_script( 'sw-old-js', get_template_directory_uri() . '/owl/owl.carousel.min.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'sl_owl_assets' );

function sl_custom_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'about-menu' => __( 'Advice Menu' )
    )
  );
}
add_action( 'init', 'sl_custom_menu' );

/* SILVERLESS DASHBOARD */

add_action('wp_dashboard_setup', 'sl_dashboard_widget');

function sl_dashboard_widget() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Silverless Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
?>

<img src="https://silverless.co.uk/wp-content/themes/silverless/images/logo__silverless.svg" style="max-width:100%;
height:auto;"/>

<img src="https://silverless.co.uk/wp-content/uploads/2016/10/icon-screen-delete.svg" style=" display: inline-block; width: 60px; margin: 2em calc(50% - 30px) 1em;"/>

<p>For support or general enquiries please contact us directly at <a href="mailto:hello@silverless.co.uk">hello@silverless.co.uk</a> or call <a href="tel:+44 (0)1672 556532">01672 556532</a></p>
<p>We aim to respond within 60 minutes during hours (Mon to Fri 9am - 5pm)</p>

<?php
}

/* SILVERLESS STYLES */

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '
<style>
#menu-posts-camp .dashicons-admin-post:before {
	font-family: "dashicons";
	content: "\f102";
}

#toplevel_page_testimonials .dashicons-admin-generic:before {
	font-family: "dashicons";
	content: "\f101";
}

#toplevel_page_call-to-action .dashicons-admin-generic:before {
	font-family: "dashicons";
	content: "\f488";
}


.taxonomy-where tr.form-field.term-description-wrap,
body.taxonomy-where .form-field.term-description-wrap,
body.taxonomy-what .form-field.term-description-wrap,
body.taxonomy-when .form-field.term-description-wrap {
	display:none;
	}

#wpcontent, #wpfooter, #wpwrap {
  background: hsl(35, 11%, 78%);
}

#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap, #wpadminbar {
  background-color: hsl(284, 15%, 20%);
}

#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
  background-color: hsl(285, 25%, 17%);
}

#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
  background: hsl(286, 25%, 17%);
  color: hsl(23, 78%, 55%);
}

ul#adminmenu a.wp-has-current-submenu:after, ul#adminmenu>li.current>a.current:after {
  border-right-color: hsl(35, 11%, 78%);
  }

#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
  color: hsl(18, 77%, 54%);
}



</style>';
}

/**
 * ACF Options Pages.
 */

 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Site Settings',
		'menu_title'	=> 'Site Settings',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'site-general-settings',
	));*/

	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'testimonials',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Call To Action',
		'menu_title'	=> 'Call To Action',
		'menu_slug' 	=> 'call-to-action',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

/**
 * Remove Default Menu Items.
 */
function remove_menus(){

  remove_menu_page( 'edit-comments.php' );          //Comments

}
add_action( 'admin_menu', 'remove_menus' );

/**
 * Allow SVG Upload.
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function md_custom_woocommerce_checkout_fields( $fields )
{
    $fields['order']['order_comments']['placeholder'] = 'Pop any info you need us to know in here, please';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );

function wptp_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );

function photojourney_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){

		// Get current page URL
		$photojourneyURL = urlencode(get_permalink());

		// Get current page title
		$photojourneyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $photojourneyTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$photojourneyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$photojourneyTitle.'&amp;url='.$photojourneyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$photojourneyURL;

		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$photojourneyURL.'&amp;media='.$photojourneyThumbnail[0].'&amp;description='.$photojourneyTitle;

		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required. Detailed steps here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="contactSocials"><h5 class="heading heading__sm">SHARE </h5>';
		$content .= ' <a href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
		$content .= '<a href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-square"></i></a>';
		$content .= '</div>';

		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'photojourney_social_sharing_buttons');

add_action('woocommerce_before_cart_totals', 'apply_product_on_coupon');
    function apply_product_on_coupon() {
        global $woocommerce;

        if ( ! empty( $woocommerce->cart->applied_coupons ) ) {
             $my_coupon = $woocommerce->cart->get_coupons() ;
             foreach($my_coupon as $coupon){

                if ( $post = get_post( $coupon->id ) ) {
                        if ( !empty( $post->post_excerpt ) ) {?>

                            <div class="text-center mt2">

                            <h2 class="heading heading__md">Great News!</h2>
                                <p>You have the following coupon applied to your purchase:</p>

                            <?php echo "<div class='discount-coupon'><p>".$coupon->code."</p></div>";
                            echo "<p class='coupon-description'>".$post->post_excerpt."</p></div>";
                        }
                }
            }
        }
    }

add_action('woocommerce_checkout_before_order_review', 'apply_product_on_coupon');

/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}

// The email function hooked that display the text
add_action( 'woocommerce_email_order_details', 'display_applied_coupons', 10, 4 );
function display_applied_coupons( $order, $sent_to_admin, $plain_text, $email ) {

    // Only for admins and when there at least 1 coupon in the order
    if ( ! $sent_to_admin && count($order->get_items('coupon') ) == 0 ) return;

    foreach( $order->get_items('coupon') as $coupon ){
        $coupon_codes[] = $coupon->get_code();
    }
    // For one coupon
    if( count($coupon_codes) == 1 ){
        $coupon_code = reset($coupon_codes);
        echo '<p>'.__( 'Coupon Used: ').$coupon_code.'<p>';
    }
    // For multiple coupons
    else {
        $coupon_codes = implode( ', ', $coupon_codes);
        echo '<p>'.__( 'Coupons Used: ').$coupon_codes.'<p>';
    }
}
