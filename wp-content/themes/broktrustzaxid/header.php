<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150533370-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-150533370-1');
	</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NBC32J9');</script>
	<!-- End Google Tag Manager -->
	<meta charset="UTF-8">
	<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' &raquo; '; } ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/css/glide.core.min.css">
	<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_url'); ?>/favicon.png">
<?php wp_head(); ?>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBC32J9"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="grid">
		<div class="container">
			<div class="grid_box">
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
				<div class="grid_item"></div>
			</div>
		</div>
	</div>
	<header>
		<div class="container">
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo.png" alt="logo" class="img-responsive"></a>
			</div>
			<div id="mainmenu">
				<div id="menumin">
					<svg width="28" height="17" viewBox="0 0 28 17" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="28" height="2.05313" rx="1.02656" fill="black"/><rect x="3.36011" y="7.47342" width="24.64" height="2.05313" rx="1.02656" fill="black"/><rect y="14.9468" width="28" height="2.05313" rx="1.02656" fill="black"/></svg>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="close"><path d="M16 0.498646L15.5022 0L8.00038 7.50128L0.499093 0L0.000732422 0.498646L7.50202 7.99986L0.000732422 15.5011L0.499093 16L8.00038 8.49772L15.5022 16L16 15.5011L8.49874 7.99986L16 0.498646Z" fill="#010002"/></svg>
				</div>
				<?php
					$args = array(
						'theme_location' => 'mainmenu',
						'container' => false
					);
					wp_nav_menu($args);
				?>
			</div>
			<div class="d-none d-md-block">
				<a href="javascript:void(0);" class="callback" onclick="callback.open();"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.5814 13.0088C16.1514 12.5611 15.6329 12.3218 15.0833 12.3218C14.5381 12.3218 14.0151 12.5567 13.5675 13.0043L12.1669 14.4005C12.0516 14.3384 11.9364 14.2808 11.8256 14.2232C11.666 14.1434 11.5154 14.0681 11.3868 13.9883C10.0749 13.155 8.88263 12.0691 7.73912 10.6641C7.1851 9.96384 6.81279 9.37436 6.54243 8.77602C6.90587 8.4436 7.24272 8.09789 7.5707 7.76547C7.6948 7.64137 7.8189 7.51284 7.943 7.38874C8.87376 6.45798 8.87376 5.25242 7.943 4.32166L6.73301 3.11167C6.59562 2.97427 6.45379 2.83244 6.32082 2.69061C6.05489 2.41582 5.77566 2.13216 5.48757 1.86622C5.05764 1.44073 4.54351 1.21469 4.00278 1.21469C3.46205 1.21469 2.93905 1.44073 2.49584 1.86622C2.4914 1.87066 2.4914 1.87066 2.48697 1.87509L0.980024 3.39533C0.412703 3.96265 0.089153 4.65407 0.0182378 5.4563C-0.0881349 6.7505 0.293034 7.95606 0.585559 8.74499C1.30357 10.6819 2.37617 12.4769 3.97619 14.4005C5.91749 16.7185 8.25326 18.549 10.9214 19.8388C11.9408 20.3219 13.3015 20.8936 14.8218 20.9911C14.9148 20.9956 15.0124 21 15.101 21C16.1248 21 16.9847 20.6321 17.6584 19.9008C17.6628 19.892 17.6717 19.8875 17.6761 19.8787C17.9066 19.5994 18.1725 19.3468 18.4517 19.0764C18.6423 18.8947 18.8373 18.7041 19.0279 18.5047C19.4667 18.0482 19.6972 17.5163 19.6972 16.9711C19.6972 16.4216 19.4623 15.8941 19.0146 15.4509L16.5814 13.0088ZM18.1681 17.6759C18.1636 17.6759 18.1636 17.6803 18.1681 17.6759C17.9952 17.862 17.8179 18.0304 17.6274 18.2166C17.3393 18.4914 17.0467 18.7795 16.7719 19.103C16.3243 19.5817 15.7969 19.8077 15.1054 19.8077C15.0389 19.8077 14.968 19.8077 14.9016 19.8033C13.5852 19.7191 12.3619 19.205 11.4444 18.7662C8.93582 17.5518 6.73301 15.8276 4.90252 13.6426C3.39114 11.8209 2.3806 10.1367 1.71134 8.32836C1.29914 7.22475 1.14845 6.3649 1.21493 5.55381C1.25925 5.03524 1.4587 4.60532 1.82657 4.23745L3.33795 2.72607C3.55513 2.52219 3.7856 2.41138 4.01165 2.41138C4.29087 2.41138 4.51692 2.57981 4.65875 2.72164C4.66318 2.72607 4.66761 2.7305 4.67204 2.73493C4.94241 2.98757 5.19947 3.24907 5.46984 3.5283C5.60724 3.67013 5.74907 3.81196 5.8909 3.95822L7.10089 5.16821C7.5707 5.63802 7.5707 6.07238 7.10089 6.54219C6.97235 6.67072 6.84825 6.79926 6.71972 6.92336C6.34741 7.30453 5.99284 7.6591 5.60724 8.00481C5.59837 8.01368 5.58951 8.01811 5.58508 8.02697C5.20391 8.40814 5.27482 8.78045 5.3546 9.03308C5.35903 9.04638 5.36347 9.05968 5.3679 9.07297C5.68258 9.83531 6.1258 10.5533 6.7995 11.4087L6.80393 11.4132C8.02722 12.9201 9.31699 14.0946 10.7397 14.9944C10.9214 15.1096 11.1076 15.2027 11.2849 15.2913C11.4444 15.3711 11.5951 15.4465 11.7237 15.5262C11.7414 15.5351 11.7591 15.5484 11.7769 15.5573C11.9275 15.6326 12.0694 15.6681 12.2156 15.6681C12.5835 15.6681 12.814 15.4376 12.8893 15.3623L14.4051 13.8464C14.5558 13.6958 14.7952 13.514 15.0744 13.514C15.3492 13.514 15.5752 13.6869 15.7126 13.8376C15.7171 13.842 15.7171 13.842 15.7215 13.8464L18.1636 16.2886C18.6202 16.7407 18.6202 17.2061 18.1681 17.6759Z" fill="white"/><path d="M11.3333 4.99532C12.4946 5.19034 13.5494 5.73993 14.3916 6.58205C15.2337 7.42417 15.7788 8.47903 15.9783 9.64026C16.027 9.93279 16.2797 10.1367 16.5678 10.1367C16.6032 10.1367 16.6342 10.1322 16.6697 10.1278C16.9977 10.0746 17.2149 9.76437 17.1617 9.43638C16.9223 8.03138 16.2575 6.75047 15.2425 5.7355C14.2276 4.72053 12.9467 4.0557 11.5416 3.81636C11.2137 3.76317 10.9078 3.98035 10.8502 4.3039C10.7926 4.62745 11.0054 4.94214 11.3333 4.99532Z" fill="white"/><path d="M20.9602 9.26355C20.5657 6.94994 19.4754 4.84465 17.8 3.16928C16.1246 1.49391 14.0193 0.403587 11.7057 0.00912211C11.3822 -0.0484964 11.0764 0.173113 11.0187 0.496664C10.9656 0.824646 11.1827 1.13047 11.5107 1.18809C13.5761 1.53823 15.4598 2.51774 16.9579 4.01139C18.456 5.50948 19.4311 7.39316 19.7812 9.45856C19.83 9.75109 20.0826 9.95497 20.3707 9.95497C20.4061 9.95497 20.4372 9.95054 20.4726 9.94611C20.7962 9.89735 21.0178 9.5871 20.9602 9.26355Z" fill="white"/></svg> Заказать звонок</a>
			</div>
		</div>
	</header>
	<main>