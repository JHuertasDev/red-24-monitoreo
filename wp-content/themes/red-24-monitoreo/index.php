<?php get_header(); ?>

<?php
if (have_posts()) {
	while (have_posts()){
		the_post();
		?>
		<h1><?php the_title(); ?></h1>
		
		<p><?php the_content(__('(more...)')); ?></p>
		<?php
	}
} else {
?>
	<p>Error.</p>
<?php
}
?>

<?php get_footer(); ?>