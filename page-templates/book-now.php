<?php
/**
 * ============== Template Name: Book Now Page
 *
 * @package Photo Journey
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">

<!-- ******************* Product Summary ******************* -->

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
     
        <div class="ticket">                
                
            <div class="ticket__title">
                
                <h3 class="heading heading__md font800"><i class="far fa-calendar-alt"></i> <?php the_title(); ?></h3>
            
            </div>
            
            <div class="ticket__places"><?php $stock_amount = $product->get_stock_quantity();?>
                
                
                    
                    <?php if($stock_amount <=7 )
                        {?>
                        
                        <div class="buy-prompt">Hurry! Only</div>
                        
                        <h4 class="heading heading__xl font200 mb0">
                          <?php echo $stock_amount; 
                        }?>
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
                
                <a href="<?php the_permalink();?>" type="button" class="button">Secure Your Place Now</a>
            
            </div>    
                
        </div><!--ticket-->      

        <?php endwhile; wp_reset_postdata(); ?>

    <?php endif; ?>

<p class="heading__xs">* Exclusions apply.  See terms for details</p>

<!--<div class="text-center mt2 mb1">
    
    <a href="/team" type="button" class="button">See All Courses</a>   
                         
</div>-->

    </div><!--12-->

 </div><!--r-->

<!-- ******************* Product Summary END ******************* -->

</div><!--c-->

<?php get_footer();?>
