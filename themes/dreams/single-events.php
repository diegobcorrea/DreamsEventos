<?php get_header(); ?>
	<section class="singlePost row">
		<div class="small-12 medium-12 large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			
			<h1 class="pagePost-title"><?php the_title(); ?></h1>

			<div class="event-content">
				<?php the_content(); ?>
			</div>

			<div class="service-gallery">
			<?php 

			$galleryArray = get_post_gallery_ids($post->ID); 
			foreach ($galleryArray as $id) : 
				$image = wp_get_attachment_image_src( $id, 'dreams-thumbnail' );
				$lg_image = wp_get_attachment_image_src( $id, 'dreams-fancybox' ); ?>
				<div class="item large-3 columns">
					<a href="<?php echo $lg_image[0]; ?>" rel="group" class="fancybox">
			    		<img src="<?php echo $image[0]; ?>">
			    	</a>
				</div>
			<?php endforeach;  ?>
			</div>
			<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>
