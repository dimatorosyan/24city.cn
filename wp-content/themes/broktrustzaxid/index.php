<?php get_header(); ?>
		<section id="main-top-box-section">
			<div class="container">
				<div class="main-top-box">
					<div class="section-title">Растаможка всех видов товара<br> импорт, экспорт, транзит</div>
					<p>Таможенный представитель, брокер, качественные таможенные услуги</p>
					<a href="javascript:void(0);" class="btn btn-reverse" onclick="callback.open();">Заказать таможенное оформление</a>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="customs-service">
					<div class="customs-service-item">
						<img src="<?php echo bloginfo('template_url'); ?>/images/customs1.svg" alt="">
						<p>Таможенное оформление</p>
					</div>
					<div class="customs-service-item">
						<img src="<?php echo bloginfo('template_url'); ?>/images/customs2.svg" alt="">
						<p>Таможенный транзит</p>
					</div>
					<div class="customs-service-item">
						<img src="<?php echo bloginfo('template_url'); ?>/images/customs3.svg" alt="">
						<p> Технический импортер</p>
					</div>
					<div class="customs-service-item">
						<img src="<?php echo bloginfo('template_url'); ?>/images/customs4.svg" alt="">
						<p>Таможенный представитель</p>
					</div>
					<div class="customs-service-item">
						<img src="<?php echo bloginfo('template_url'); ?>/images/customs5.svg" alt="">
						<p>Таможенное консультирование</p>
					</div>
				</div>
			</div>
		</section>

		<?php /* ?><section>
			<div class="container">
				<div id="imextran">
					<div class="section-title">Растаможка товаров — импорт, экспорт, транзит</div>
					<p>Если Вам необходимо в сжатые сроки произвести импорт товаров из-за границы или отправить на экспорт продукцию в иностранные государства, не теряйте времени – обращайтесь в компанию Broktrustzaxid.</p>
					<p>Заказывая растаможку товаров от компании Broktrustzaxid вы получаете скорость и высокое качество услуг по доступным ценам.</p>
					<p>Кроме того, выбрав компанию Broktrustzaxid в качестве вашего брокера вы получите существенные преимущества!</p>
				</div>
			</div>
		</section><?php */ ?>

		<section>
			<div class="container">
				<div class="section-title centered">Преимущества работы с компанией</div>
				<div id="benefits">
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit1.svg" alt="">
						<p>Знание и практическое применение таможенного законодательства</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit2.svg" alt="">
						<p>Богатый опыт в решении нестандартных задач</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit3.svg" alt="">
						<p>Отработанная технология работы клиентского обслуживания</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit4.svg" alt="">
						<p>Четкий и своевременный результат. Скорость таможенного оформления</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit5.svg" alt="">
						<p>Таможенное оформление без Вашего личного присутствия на таможне</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit6.svg" alt="">
						<p>Правовая поддержка. Нет нарушений = нет доп. затрат</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit7.svg" alt="">
						<p>Неразглашение коммерческой и другой информации конфиденциального характера.</p>
					</div>
					<div class="benefit-item">
						<img src="<?php echo get_bloginfo('template_url'); ?>/images/benefit8.svg" alt="">
						<p>Выпуск товаров без корректировки таможенной стоимости</p>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div id="vip">
					<div><img src="<?php echo get_bloginfo('template_url'); ?>/images/vip.svg" alt="" class="img-responsive"></div>
					<div>
						<div class="section-title">Особые условия для наших постоянных клиентов</div>
						<p>Мы всегда рады новым клиентам! Оставьте свои контакты и мы обязательно с вами свяжемся в самое ближайшее время.</p>
						<?php echo do_shortcode('[contact-form-7 id="42" title="Связаться с нами"]'); ?>
					</div>
				</div>
			</div>
		</section>

		<?php
			$query = new WP_Query(array('post_type' => 'review'));
			if($query->have_posts()):
		?>
		<section id="reviews">
			<div class="container">
				<div class="section-title centered">Наши отзывы</div>
				<div class="reviews">
					<?php while($query->have_posts()): $query->the_post(); ?>
					<div class="review-item">
						<div class="review-item-avatar">
							<?php if(has_post_thumbnail()): ?>
							<img src="<?php echo kama_thumb_src('post_id='.get_the_ID().'&w=200&h=200'); ?>" alt="<?php the_title(); ?>">
							<?php else: ?>
							<img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' style='width:24px;height:24px' viewBox='0 0 24 24'%3E%3Cpath fill='%23cccccc' d='M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z' /%3E%3C/svg%3E" class="noimgage" alt="no image">
							<?php endif; ?>
						</div>
						<div class="review-item-name"><?php the_title(); ?></div>
						<div class="review-item-text"><?php the_content(); ?></div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
<?php get_footer(); ?>