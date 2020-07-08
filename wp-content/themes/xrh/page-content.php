<?php /* Template Name: Text page template */ ?>

<?php get_header(); ?>
<section class="content-page">
	<div class="container">
        <?php
		while ( have_posts() ) :
			the_post(); ?>

		<h1><?php the_title() ?></h1>
		<div class="content-part">
            <?php the_content(); ?>
		</div>
		<?php
            endwhile; // End of the loop.
		?>
	</div>
</section>
<?php get_footer(); ?>
