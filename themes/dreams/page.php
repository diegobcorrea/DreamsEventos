<?php get_header(); ?>

	<section class="pagePost row">
		<div class="small-12 medium-12 large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			<figure class="pagePost-image">
				<?php the_post_thumbnail(); ?>
			</figure>
			<h1 class="pagePost-title"><?php the_title(); ?></h1>
			<div class="pagePost-content">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>
