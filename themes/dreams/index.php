<?php get_header(); ?>
	
	<section class="row">
		<?php if(!wp_is_mobile()): ?>
		<div class="slideshow large-12 columns">
			<div class="wrapper">
			<?php 

			$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); 

			$query = new WP_Query( array( 
				'post_type' => 'slideshow', 
				'posts_per_page' => 10,
				'order' => 'ASC',
			)); 
			?>
			<?php if ($query->have_posts()) : $slide = 0; ?>
		    <?php while ( $query->have_posts() ) : $query->the_post(); global $post; 

			    $image = get_post_meta($post->ID, 'img_tag_value',true);

			?>
				<div class="item" data-slide="<?php echo $slide; ?>">
					<img src="<?php echo $image; ?>">
				</div>
			<?php $slide++; ?>
			<?php endwhile; ?>	
			<?php endif; ?>
			</div>
			<div class="prev" id="item_prev"></div>
			<div class="next" id="item_next"></div>
		</div>
		<?php endif; ?>

		<div class="services-home">
			<h2>Servicios</h2>
			
			<div class="large-3 columns">
				<div class="servicesBox">
					<img src="<?php echo get_template_directory_uri(); ?>/images/servicios/home-sociales.jpg" alt="Sociales">
					<h3>Sociales</h3>
					<p>Tenemos todo lo necesario para la organización de tu fiesta, atendemos bodas, cumpleaños, quinceañeros, fiestas temáticas, reencuentros y muchos más.</p>
					<a class="more"></a>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="servicesBox">
					<img src="<?php echo get_template_directory_uri(); ?>/images/servicios/home-buffets.jpg" alt="Buffets & Banquetes">
					<h3>Buffets & Banquetes</h3>
					<p>Llevamos nuestro servicio donde desees, atendemos almuerzos, buffets, banquetes de matrimonio y todo tipo de comidas.</p>
					<a class="more"></a>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="servicesBox">
					<img src="<?php echo get_template_directory_uri(); ?>/images/servicios/home-corporativos.jpg" alt="Corporativos">
					<h3>Corporativos</h3>
					<p>Desde un pequeño coffe break o desayuno hasta recepciones y all days, todo lo necesario para tu empresa.</p>
					<a class="more"></a>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="servicesBox">
					<img src="<?php echo get_template_directory_uri(); ?>/images/servicios/home-piqueos.jpg" alt="Piqueos & Bebidas">
					<h3>Piqueos & Bebidas</h3>
					<p>Si tienes un reunión pequeña, cumpleaños o te animaste a invitar amigos a casa éste servicio es ideal para ti.</p>
					<a class="more"></a>
				</div>
			</div>
		</div>

		<div class="companyData">
			<div class="large-12 columns">
				<div class="box">
					<div class="mini-box large-6 columns">
						<h3>Visión</h3>
						<p>Ser la empresa líder en el mercado de Organización de Eventos y Catering, reconocidos por nuestro profesionalismo, honestidad, vocación de servicio y excelente sazón.</p>
					</div>
					<div class="mini-box large-6 columns">
						<h3>Misión</h3>
						<p>Brindar  asesoría integral y personalizada, con ideas innovadoras y profesionales que potencien las ideas de nuestros clientes garantizando el éxito sus eventos, basándonos en una relación de confianza y transparencia.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="bigTitle large-12 columns">
			En DREAMS EVENTOS pensamos en todos las etapas, lo que garantiza nuestro compromiso y pasión en la planificación y producción de eventos.
		</div>
	</section>

	
<?php get_footer(); ?>
