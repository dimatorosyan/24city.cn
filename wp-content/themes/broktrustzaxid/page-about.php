<?php
// Template Name: Page About
?>
<?php get_header(); ?>
		<section>
			<div class="container">
				<div class="dream-box">
					<div>
						<div class="dream-box-title">Исполним вашу мечту про машину из-за границы</div>
						<a href="#calc-form" class="btn btn-reverse">Заказать таможенное оформление</a>
					</div>
					<ul>
						<li><span>Оформление под ключ</span></li>
						<li><span>Поиск и пригон с ЕС и США</span></li>
						<li><span>Разтаможка</span></li>
						<li><span>Доставка 7-10 дней</span></li>
						<li><span>Сертификация</span></li>
					</ul>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="box-left">
					<div class="section-title">Таможенное оформление Вашего транспорта надежными брокерами</div>
					<p>У нас вы можете пройти таможенное оформление любых транспортных средств (новых и бывших в употреблении авто). Наши эксперты предоставят услуги по подготовке, организации и сопровождения таможенного оформления вашего автомобиля.</p>
					<a href="<?php echo home_url('/'); ?>#reviews" class="btn">Перейти к отзывам</a>
				</div>
				<div class="box-right">
					<img src="<?php echo get_bloginfo('template_url'); ?>/images/about-frame.svg" alt="" class="img-responsive">
				</div>
			</div>
		</section>

		<section class="new-single">
			<div class="container">
				<div class="section-title centered">Необходимые документы</div>
				<div class="section-title-description">Отправьте нам сканы документов для расчета <br>таможенных платежей и консультации</div>
				<div id="services">
					<div class="service-item">
						<div class="service-item-box">
							<div class="service-number">&nbsp;</div>
							<div class="service-description">Техпаспорт</div>
						</div>
					</div>
					<div class="service-item">
						<div class="service-item-box">
							<div class="service-number">&nbsp;</div>
							<div class="service-description">Индивидуальный налоговый номер</div>
						</div>
					</div>
					<div class="service-item">
						<div class="service-item-box">
							<div class="service-number">&nbsp;</div>
							<div class="service-description">Паспорт</div>
						</div>
					</div>
					<div class="service-item">
						<div class="service-item-box">
							<div class="service-number">&nbsp;</div>
							<div class="service-description">Подтверждение о снятии с учета</div>
						</div>
					</div>
					<div class="service-item">
						<div class="service-item-box">
							<div class="service-number">&nbsp;</div>
							<div class="service-description">Купча</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php $query = new WP_Query(array('cat' => 6)); ?>
		<?php if($query->have_posts()): ?>
		<section>
			<div class="container">
				<div class="section-title centered">Новости</div>
				<div class="news">
					<div data-glide-el="track" class="glide__track">
						<ul class="glide__slides">
							<?php while($query->have_posts()): $query->the_post(); ?>
							<li class="glide__slide">
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
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<div data-glide-el="controls">
						<button data-glide-dir="<">
							<div class="new-item-prev">
								<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.08534 9.99948L11.1177 0.96715C11.3398 0.74501 11.3398 0.388746 11.1177 0.166606C10.8955 -0.0555352 10.5393 -0.0555352 10.3171 0.166606L0.882426 9.6013C0.660285 9.82344 0.660285 10.1797 0.882426 10.4018L10.3171 19.8323C10.4261 19.9413 10.5728 20 10.7153 20C10.8578 20 11.0045 19.9455 11.1135 19.8323C11.3356 19.6102 11.3356 19.2539 11.1135 19.0318L2.08534 9.99948Z" fill="black"/></svg>
							</div>
						</button>
						<button data-glide-dir=">">
							<div class="new-item-next">
								<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.91466 10.0005L0.882335 19.0328C0.660194 19.255 0.660194 19.6113 0.882335 19.8334C1.10448 20.0555 1.46074 20.0555 1.68288 19.8334L11.1176 10.3987C11.3397 10.1766 11.3397 9.8203 11.1176 9.59816L1.68288 0.167653C1.57391 0.0586768 1.42721 -8.61724e-07 1.2847 -8.74182e-07C1.1422 -8.8664e-07 0.995501 0.0544863 0.886527 0.167653C0.664386 0.389792 0.664386 0.746055 0.886527 0.968196L9.91466 10.0005Z" fill="black"/></svg>
							</div>
						</button>
					</div>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<section>
			<div class="container">
				<div class="calc-form" id="calc-form">
					<div class="section-title centered">Расчет таможенных платежей</div>
					<?php echo do_shortcode('[contact-form-7 id="42" title="Розрахунок митних платежів"]'); ?>
				</div>
			</div>
		</section>
<?php get_footer(); ?>