<?php
/*
	#Template Name: Template - Contact
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
				<form class="contact" action="">
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<input type="text" class="small-10 medium-10 large-12 columns" placeholder="Nombre completo" required>
					</div>
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<input type="email" class="small-10 medium-10 large-12 columns" placeholder="Correo eléctronico" required>
					</div>
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<input type="text" class="small-10 medium-10 large-12 columns" placeholder="Asunto" required>
					</div>
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<input type="tel" class="small-10 medium-10 large-12 columns" placeholder="# Teléfono Celular" required>
					</div>
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<input type="tel" class="small-10 medium-10 large-12 columns" placeholder="# Teléfono Fijo" required>
					</div>
					<div class="field small-10 medium-10 large-centered large-10 columns">
						<textarea class="small-10 medium-10 large-12 columns" placeholder="Mensaje" required></textarea>
					</div>
				</form>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
