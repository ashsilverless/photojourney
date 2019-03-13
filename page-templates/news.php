<?php 
    /**
 * ============== Template Name: News Page
 */

get_header();  /* @package Photo Journey*/ ?>

<!-- ******************* Hero Content ******************* -->

<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<div class="wrapper-hero mb3" style="background-image: url(<?php echo $heroImage[0]; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 wrapper-hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light font800"><?php the_title();?></h1>            
                <h2 class="heading heading__sm heading__light font300"><?php the_field('sub_headline');?></h2>               
            </div>       
                
        </div>
    
    </div>

    
</div>

<!-- ******************* Hero Content END ******************* -->
 
<div class="container">
        
    <div class="post-summary">
            
            <?php 
            $args = array (
            	'post_type'              => 'post',
            	'posts_per_page'         => '-1'
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
  
</div>
 
<?php get_footer(); ?>