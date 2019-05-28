<?php
/**
 * ============== Template Name: Contact Page
 *
 * @package Photo Journey
 */
get_header();?>

<?php get_template_part('template-parts/page', 'hero');?>

<div class="container">

    <div class="row">
    
        <div class="col-sm-5 offset-sm-1 mb2">
            
            <h3 class="heading heading__sm">Got A Question for us?</h3>
            
            <p><?php the_field('copy');?></p>
            
            <a href="mailto:info@photojourney.co.uk">info@photojourney.co.uk</a>

            <div class="contactSocials">
                        <?php if( have_rows('social_links', 'option') ): while( have_rows('social_links', 'option') ): the_row(); ?>
                          <a href="<?php the_sub_field('page_link'); ?>"><i class="fab fa-<?php the_sub_field('name'); ?>"></i></a>
                        <?php endwhile; endif; ?>  
            </div>
        
        </div>
    
        <div class="col-sm-5">
            
            <?php echo do_shortcode('[contact-form-7 id="1325" title="Untitled"]');?>    
            
        </div>
    
    </div><!--r-->

</div><!--c-->

<?php get_footer();?>
