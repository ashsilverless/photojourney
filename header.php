<?php
/**
 * The header for our theme
 *
 * @package Photo Journey
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.typekit.net/qnr3dic.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site-wrapper">

		<nav>
            
            <div class="nav-menu">
            
            <?php
            wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'container_class' => 'mainMenu' ) );
            ?>
            
            </div>
				
			<div class="container">

				<div class="row">

					<div class="col-3">

						<div class="menu-trigger hamburger hamburger--collapse">
							
							<div class="hamburger-box">
								
								<div class="hamburger-inner"></div>
								
							</div>
							
						</div>

					</div>

					<div class="col-6 brand">
    					
    				    <?php $brandImage = get_field('logo', 'options');?>	
    				
						<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>">
    						
    						<img src="<?php echo $brandImage['url'];?>" alt="" title=""/>
    						
						</a>
						
					</div>                    

                    <div class="col-3 book-now">
                        
                        <a href="http://photo-journey.local/#tickets">Book Now</a>
                    
                    </div>

				</div>

			</div>

		</nav>

	<main>
