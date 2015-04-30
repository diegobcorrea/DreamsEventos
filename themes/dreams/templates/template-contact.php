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
				<form class="contact">
					<div class="field small-12 medium-12 large-centered large-10 columns">
						<input id="name" type="text" class="small-12 medium-12 large-12 columns" placeholder="Nombre completo" required>
					</div>
					<div class="field small-12 medium-12 large-centered large-10 columns">
						<input id="email" type="email" class="small-12 medium-12 large-12 columns" placeholder="Correo eléctronico" required>
					</div>
					<div class="field small-12 medium-12 large-centered large-10 columns">
						<input id="subject" type="text" class="small-12 medium-12 large-12 columns" placeholder="Asunto" required>
					</div>
					<div class="field small-12 medium-12 large-centered large-10 columns">
						<input id="phone" type="tel" class="small-12 medium-12 large-12 columns" placeholder="# Teléfono Celular" required>
					</div>
					<div class="field small-12 medium-12 large-centered large-10 columns">
						<input id="mobile" type="tel" class="small-12 medium-12 large-12 columns" placeholder="# Teléfono Fijo" required>
					</div>
					<div class="field textarea small-12 medium-12 large-centered large-10 columns">
						<textarea id="message" class="small-12 medium-12 large-12 columns" placeholder="Mensaje" required></textarea>
					</div>
					<div class="center submit-btn small-12 medium-12 large-12 columns">
						<input type="submit" id="sendContact" class="small-12 medium-centered medium-4 large-centered large-3 columns" name="contactForm" value="Enviar mensaje">
					</div>
				</form>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
