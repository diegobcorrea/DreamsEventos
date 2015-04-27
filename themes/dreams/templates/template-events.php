<?php
/*
	#Template Name: Template - Events
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
				'post_type' => 'events', 
				'posts_per_page' => 50, 
				'order' => 'ASC',
			));

			?>
			<?php if ($query->have_posts()) : $slide = 1; ?>
			    <?php 

			    while ( $query->have_posts() ) : $query->the_post(); global $post; 

			    $date = get_post_meta($post->ID, 'date_event_value', true);

			    ?>
				<div class="item-event small-12 medium-3 large-3 columns">
					<div class="inner-box">
						<a href="<?php the_permalink(); ?>">
				    		<?php the_post_thumbnail('dreams-thumbnail'); ?>
				    	</a>
				    	<h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				    	<span class="event-date">Fecha: <?php echo $date; ?></span>
				    	<a href="<?php the_permalink(); ?>" class="more"></a>
			    	</div>
				</div>
				<?php $slide++; ?>
				<?php endwhile; ?>	
			<?php endif; ?>	
			</div>
		</div>
	</section>

<?php get_footer(); ?>
