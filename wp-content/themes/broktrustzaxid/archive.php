<?php get_header(); ?>
		<section>
			<div class="container">
				<div class="section-title centered"><?php single_cat_title(); ?></div>
				<?php if(have_posts()): ?>
				<div class="news">
					<?php while(have_posts()): the_post(); ?>
					<div class="new-item">
						<div class="new-item-photo">
							<?php if(has_post_thumbnail()): ?>
							<img src="<?php echo kama_thumb_src('post_id='.get_the_ID().'&w=573&h=300'); ?>" alt="<?php the_title(); ?>" class="img-responsive">
							<?php else: ?>
							<img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px' viewBox='0 0 24 24'%3E%3Cpath fill='%23cccccc' d='M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z' /%3E%3C/svg%3E" class="noimgage" alt="no image">
							<?php endif; ?>
						</div>
						<div class="new-item-bottom">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<p><?php echo wp_trim_words(get_the_content(), 12); ?></p>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				<?php if(function_exists('kama_pagenavi')){ ?>
				<div class="pager"><?php kama_pagenavi(); ?></div>
				<?php } ?>
				<?php else: ?>
				<p class="text-center"><strong>Записей не найдено!</strong></p>
				<br>
				<br>
				<br>
				<?php endif; ?>
			</div>
		</section>
<?php get_footer(); ?>