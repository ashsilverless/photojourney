<?php
/**
 * ============== Template Name: Home
 *
 * @package Photo Journey
 */
get_header();?>

<?php if(get_field('site_version', 'options')=='nepal'){
    $location = '';
} elseif(get_field('site_version', 'options')=='scotland') {
    $location = '/scotland';
} else {
    //Silence
}?>

<!-- ******************* Hero Content ******************* -->
    <?php
        $frontImg = get_field('background_image_front');
        $rearImg = get_field('background_image_rear');
    ?>

<div class="home wrapper-hero mb3">

    <div class="rear-image" style="background-image: url(<?php echo $rearImg['url']; ?>);"></div>

    <div class="front-image" style="background-image: url(<?php echo $frontImg['url']; ?>);"></div>

    <div class="container">

        <div class="row">

            <div class="col-sm-6 offset-sm-6 wrapper-hero__content">

                <h1 class="heading heading__sm heading__light font800"><?php the_field( 'pre_hero_heading' );?></h1>
                <h3 class="heading heading__xl heading__light"><?php the_field( 'hero_heading' );?></h3>
                <h2 class="heading heading__md heading__light heading__normal-case font200 <?php if (get_field('add_background_colour')){
                    echo 'has-background';
                }?>" style="background-color:<?php the_field( 'add_background_colour' );?>;"><?php the_field( 'hero_copy' );?>
                    <?php if (get_field('add_background_colour')){?>
                        <span style="background-color:<?php the_field( 'add_background_colour' );?>;"></span>
                    <?php }?>
                </h2>

                    <a href="#tickets" type="button" class="button button__prompt mt3">

                        <?php the_field( 'text' );?><i class="fas fa-angle-right"></i>

                        <span class="button__supporting"><?php the_field( 'supporting_text' );?></span>

                    </a>

            </div>

        </div>

    </div>

    <a href="#nepal" class="next-section">Learn More</a>

    <?php if( have_rows('cross-site_button') ): ?>
    	<?php while( have_rows('cross-site_button') ): the_row(); ?>
            <?php if (get_sub_field('main_text')):?>

            <a href="<?php the_sub_field( 'button_target' );?>" class="cross-site-button desktop" target="_blank">
                <h2><span>Looking for</span><?php the_sub_field( 'main_text' );?>?</h2>
                <p><?php the_sub_field( 'sub_text' );?></p>
            </a>
        <?php endif;?>
        <?php endwhile;?>
    <?php endif;?>
</div>

<!-- ******************* Hero Content END ******************* -->

<!-- *************** Mobile Cross Site Button ************** -->
<?php if( have_rows('cross-site_button') ): ?>
    <?php while( have_rows('cross-site_button') ): the_row(); ?>
        <?php if (get_sub_field('main_text')):?>

        <a href="<?php the_sub_field( 'button_target' );?>" class="cross-site-button mobile" target="_blank">
            <h2><span>Looking for</span><?php the_sub_field( 'main_text' );?>?</h2>
            <p><?php the_sub_field( 'sub_text' );?></p>
        </a>
    <?php endif;?>
    <?php endwhile;?>
<?php endif;?>
<!-- *************** Mobile Cross Site Button END ************** -->

<div class="container">

<!-- ******************* Text Area ******************* -->

<div class="text-area mb3">

    <div class="row">

        <div class="col-sm-5 offset-sm-1 d-sm-block d-none">

            <div class="text-area__one">

            <?php if( get_field('text_area_1') == 'Quote' ): ?>

                <div class="pull-quote">

                    <?php the_field( 'quote' );?>
                    <?php the_field( 'attribute' );?>

                </div>

            <?php else:?>

               <?php the_field( 'ta1_heading' );?>

            <?php endif;?>

            </div>

        </div>

        <div class="col-sm-5">

            <div class="text-area__two">

                <h2 class="heading heading__lg"><?php the_field( 'ta2_heading' );?></h2>

                <div class="expanding-copy">

                <div class="expanding-copy__lead">

                    <?php the_field( 'lead_copy' );?>

                </div>

                <?php if( get_field('read_more') ): ?>

                    <a class="trigger-expand">Read More</a>

                <?php endif; ?>

                <div class="expanding-copy__more">

                    <?php the_field('read_more'); ?>

                </div>

                <?php if( get_field('read_more') ): ?>

                    <a class="trigger-collapse hide">Read Less</a>

                <?php endif; ?>

            </div>

            </div>

        </div>

    </div><!--r-->

</div>

<!-- ******************* Text Area END ******************* -->

<!-- ******************* Learn More ******************* -->
<div id="nepal"></div>

<div class="learn-more mb3">

    <div class="row">

        <div class="col-sm-10 offset-sm-1">

            <?php $learnImage = get_field('learn_more_image');?>

           <div class="overlapped-image">

               <img src="<?php echo $learnImage['url']; ?>"/>

           </div>

        </div>

    </div><!--r-->

    <div class="row">

        <div class="col-sm-8 offset-sm-2">

            <div class="learn-more__content">

                <div class="row">

                    <div class="col-md-6 col-3">
                        <?php $mapImage = get_field('learn_more_map');
                        $detailMap = get_field('detail_map');
                        ?>
                        <img src="<?php echo $mapImage['url'];?>" />

                        <!--<?php if(get_field('site_version', 'options')=='nepal'){
                            get_template_part( 'template-parts/nepal', 'map');
                        } elseif(get_field('site_version', 'options')=='scotland') {
                            get_template_part( 'template-parts/scotland', 'map');
                        } else {
                            //No map served
                        }?>-->
                    </div>

                    <div class="col-md-6 col-9 mb1">

                         <h2 class="heading heading__lg"><?php the_field( 'learn_more_heading' );?></h2>

                        <?php the_field( 'learn_more_copy' );?>

                        <a href="<?php the_field( 'button_target' );?>" type="button" class="button mt1 mb1"><?php the_field( 'button_text' );?></a>

                    </div>
                    <div class="col-12">
                        <img src="<?php echo $detailMap['url'];?>" class="detail-map"/>
                    </div>
                </div><!--r-->

            </div>

        </div>

    </div><!--r-->

</div>

<!-- ******************* Learn More END ******************* -->

<!-- ******************* Product Summary ******************* -->

<div id="tickets"></div>

<h3 class="heading heading__lg mb1">Upcoming Courses</h3>

<div class="row mb3">

    <div class="col-12">

    <?php
    $params = array(
    'posts_per_page' => 3,
    'post_type' => 'product',
    'orderby' => 'date',
    'order'   => 'ASC',
    );
    $wc_query = new WP_Query($params);

    if ($wc_query->have_posts()) :
        while ($wc_query->have_posts()) :
            $wc_query->the_post(); ?>

            <?php $stock_amount = $product->get_stock_quantity();?>

            <?php if($stock_amount >=0 )
                {?>

        <div class="ticket">

            <div class="ticket__title">

                <h3 class="heading heading__md font800"><i class="far fa-calendar-alt"></i> <?php the_title(); ?></h3>

            </div>

            <div class="ticket__places">

                    <?php if($stock_amount <=7 & $stock_amount >0 )
                        {?>

                        <div class="buy-prompt">Hurry! Only</div>

                        <h4 class="heading heading__xl font200 mb0">
                          <?php echo $stock_amount;
                        }?>

                        <?php if($stock_amount <=0 )
                        {?>

                        <div class="buy-prompt">Fully Booked</div>

                        <h4 class="heading heading__xl font200 mb0">
                            0
                          <?php  }?>

                        </h4>

                <p class="heading heading__xs font200 inline">Places Available</p>

            </div>

            <div class="ticket__empty">

                <p class="mb0">Secure your place with a deposit of just</p>

            </div>

            <div class="ticket__from">

                <h4 class="heading heading__sm font400 mb0">From</h4>

                <p class="mb0"><?php the_field('date_from'); ?></p>

            </div>

            <div class="ticket__to">

                <h4 class="heading heading__sm font400 mb0">To</h4>

                <p class="mb0"><?php the_field('date_to'); ?></p>

            </div>

             <div class="ticket__cost">

                <h4 class="heading heading__sm font400 mb0">Prices From</h4>

                <p class="mb0"><?php the_field('tour_cost'); ?> <span class="heading heading__light font200">*</span></p>

            </div>

            <div class="ticket__location">

                <p class="mb0"><span class="heading heading__xs font400 mb0">Visiting:</span>

                <?php
                if( have_rows('location') ):
                while ( have_rows('location') ) : the_row(); ?>

                    <span class="location"><?php the_sub_field('locations'); ?></span>

                <?php endwhile;
                endif;?>

                </p>

            </div>

            <div class="ticket__deposit">
<?php
    $product = wc_get_product(  );
    $price = $product->get_price();?>
                <h4 class="heading heading__xl font400 mb0">£<?php echo $price;?></h4>

            </div>

            <div class="ticket__book">

                <?php if($stock_amount <=0 ) {?>
                    <a href="<?php the_permalink();?>" type="button" class="button button__fully-booked">Fully Booked</a>

                <?php  }?>

                <?php if($stock_amount >=1 ) {?>
                    <a href="<?php the_permalink();?>" type="button" class="button">Secure Your Place Now</a>
                <?php  }?>
            </div>

        </div><!--ticket-->

            <?php }?>

        <?php endwhile; wp_reset_postdata(); ?>

    <?php endif; ?>

<p class="heading__xs">* Exclusions apply.  See terms for details</p>

<!--<div class="text-center mt2 mb1">

    <a href="/team" type="button" class="button">See All Courses</a>

</div>-->

    </div><!--12-->

 </div><!--r-->

<!-- ******************* Product Summary END ******************* -->

<!-- ******************* Meet The Team ******************* -->

<div class="row">

    <div class="col-12">

	<h3 class="heading heading__lg mb1">Meet The Team</h3>

    </div>

<?php
  if( have_rows('team_member') ):
    while ( have_rows('team_member') ) : the_row();

    $teamImg = get_sub_field('mtt_image'); ?>

    <div class="col-4 col-sm team">

        <div class="bio">

                <img src="<?php echo $teamImg['url']; ?>"/>

        		<h3 class="heading heading__md heading__alt-color mt1 mb1 text-center"><?php the_sub_field('name'); ?></h3>

        </div>

    </div>

<?php endwhile;
endif;?>

</div><!--r-->

<div class="text-center mt1 mb3">

    <a href="<?=$location;?>/team" type="button" class="button">Find Out More</a>

</div>

<!-- ******************* Meet The Team END ******************* -->

<!-- ******************* Gallery  ******************* -->

<div class="row"><!--Gallery Block -->

    <div class="col-lg-12">

	<h3 class="heading heading__lg mb1"><?php the_field('gs_heading'); ?></h3>

    <?php
    $images = get_field('image_gallery');
    if( $images ): ?>

        <div class="gallery">

        <?php foreach( $images as $image ): ?>

        <a href="<?php echo $image['url']; ?>" class="lodge-gallery"  alt="<?php echo $image['alt']; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></a>

        <?php endforeach; ?>

    </div>

    <?php endif; ?>

    <div class="text-center mt0 mb3">

        <a href="<?=$location;?>/gallery" type="button" class="button">See Full Gallery</a>

    </div>

    </div>

</div><!--row-->

<!-- ******************* Gallery END ******************* -->

<!-- ******************* News Section ******************* -->

<h3 class="heading heading__lg mb1">Latest News</h3>

    <div class="post-summary">

            <?php
            $args = array (
            	'post_type'              => 'post',
            	'posts_per_page'         => '1'
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
            	while ( $query->have_posts() ) {
            		$query->the_post();

            $postImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

            <div class="post-summary__item">

                <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="post-image"><img src="<?php echo $postImage[0];?>"/></a>

                <h2 id="post-<?php the_ID(); ?>" class="heading heading__md">

                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

                </h2>

                <p class="heading heading__xs heading__alt-color font200 mb1"><?php the_date() ?></p>
                <?php the_excerpt() ?>

                <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>" class="">Read More</a>

            </div>

            <?php 	}
            } else {
            	// no posts found
            }
            // Restore original Post Data
            wp_reset_postdata();?>

        </div>

<!-- ******************* News Section END ******************* -->

</div><!--c-->

<?php get_footer();?>
