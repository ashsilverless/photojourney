<?php
/**
 *
 * @package Photo Journey
 */
get_header();?>

    <div class="container">

        <div class="row">
	        
        <h1>WHERE</h1>
        
        </div>
        
        <div class="row">		

			<?php $terms = get_terms( array(
			    'taxonomy' => 'where',
			    'parent'   => $term->term_id,
			    'hide_empty' => false,
			    'orderby' => 'term_order',
				'order'     => 'ASC'
			) );

			foreach ( $terms as $term ): ?>
			
			<div class="col-md-6">
				<?php echo "<h2>" . $term->name . "</h2>";
				$desc = get_field('description', $term);
				$descMore = get_field('description_more', $term);
				echo "<h4>" . $desc  . "</h4>" . $descMore;
				?>

				<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="">Explore <?php echo $term->name; ?>	</a>

				<?php $bannerImage = get_field('banner_image', $term);?>
			
				<div class="img-wrapper" style="width:300px;">
					<img src="<?php echo $bannerImage;?>" class="small" alt="" title=""/>
				</div>		
			</div>
			
			<?php endforeach; ?>	 

        </div><!--row-->
        
    </div><!--container-->