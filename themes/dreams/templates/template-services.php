<?php
/*
	#Template Name: Template - Services
*/
?>
<?php get_header(); ?>

	<section class="pagePost row">
		<div class="small-12 medium-12 large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			<figure class="pagePost-image">
				<?php the_post_thumbnail(); ?>
			</figure>
			<h1 class="pagePost-title"><?php the_title(); ?></h1>
			<?php endwhile; ?>
			<div class="pagePost-content">
			<?php 

			$query = new WP_Query( array( 
				'post_type' => 'services', 
				'posts_per_page' => 5, 
				'order' => 'ASC',
			));

			?>
			<?php if ($query->have_posts()) : $slide = 1; ?>
			    <?php while ( $query->have_posts() ) : $query->the_post(); global $post; ?>
				<div class="service-box">
					<a href="<?php the_permalink(); ?>">
						<div class="service-image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="service-data">
							<h3><?php echo the_title(); ?></h3>		
							<?php echo the_content(); ?>
						</div>
						<div class="more-vertical"></div>
					<a/>
				</div>
				<?php $slide++; ?>
				<?php endwhile; ?>	
			<?php endif; ?>	
			</div>
		</div>

		<div class="bigTitle large-12 columns">
			Con nosotros tu evento tendrá la garantía que buscas, con seriedad y puntualidad al momento de brindar el servicio.
		</div>
	</section>

<?php get_footer(); ?>
