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
    <meta name="description" content="Guided Photography Tours, Nepal">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">

	<title>Photo Journey | Guided Photography Tours</title>

    <link rel="stylesheet" href="https://use.typekit.net/qnr3dic.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>//site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>//safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


	<?php wp_head(); ?>
</head>
<?php $typeField = get_field('site_version', 'options');?>
<body <?php body_class($typeField); ?>>

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

					<div class="col-sm-3 col-1">

						<div class="menu-trigger hamburger hamburger--collapse">

							<div class="hamburger-box">

								<div class="hamburger-inner"></div>

							</div>

						</div>

					</div>

					<div class="col-sm-6 col-10 brand">

    				    <?php $brandImage = get_field('logo', 'options');?>

						<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>">

    						<img src="<?php echo $brandImage['url'];?>" alt="" title=""/>

						</a>

					</div>

                    <div class="col-sm-3 d-sm-block d-none book-now">

                        <a href="/book-now">Book Now</a>

                    </div>

				</div>

			</div>

		</nav>

	<main>
