<?php
/**
 * The template for displaying films .
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				<h4>Country</h4>
				<ul><?php echo get_the_term_list( $post->ID, 'films_country', '<li class="films_item">', ', ', '</li>' ) ?></ul>
				<h4>Genre</h4>
				<ul><?php echo get_the_term_list( $post->ID, 'films_genre', '<li class="films_item">', ', ', '</li>' ) ?></ul>
				<!--<h4>Film Year</h4>
				<ul><?php echo get_the_term_list( $post->ID, 'films_year', '<li class="films_item">', ', ', '</li>' ) ?></ul>
				<h4>Actors/Cast:</h4>
				<ul><?php echo get_the_term_list( $post->ID, 'films_actor', '<li class="films_item">', ', ', '</li>' ) ?></ul>-->
				<?php $custom = get_post_custom( $post->ID ); ?>
				<p>
					<label>Ticket Price:</label><br />
					<?php echo @$custom["ticket_price"][0] ?>
				</p>
				<p>
					<label>Release Date:</label><br />
					<?php echo @$custom["release_date"][0] ?>
				</p>
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
