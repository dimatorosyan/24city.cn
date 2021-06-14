<?php get_header(); ?>
		<section>
			<div class="container">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
				<h1 class="section-title"><?php the_title(); ?></h1>
				<div class="content">
					<?php the_content(); ?>
				</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</section>
<?php get_footer(); ?>