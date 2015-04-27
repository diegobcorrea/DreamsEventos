<?php get_header(); ?>
	<section class="singlePost row">
		<div class="small-12 medium-12 large-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
			<figure class="singlePost-image">
				<?php the_post_thumbnail('wplatzi-full-width'); ?>
			</figure>
			<h1 class="singlePost-title"><?php the_title(); ?></h1>
			<div class="singlePost-content">
				<?php the_content(); ?>
			</div>

			<div class="singlePost-info large-9 large-centered columns">
				<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></div>
				<div class="author-info">
					<div class="author-name"><?php the_author(); ?></div>
					<div class="post-date"><?php the_time('d \d\e F, Y') ?></div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</section>

<?php get_footer(); ?>
